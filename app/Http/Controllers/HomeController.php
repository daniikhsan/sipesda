<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\User;
use App\Models\SuratKeterangan\Domisili;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin'){
            $total_sk_domisili = [0,0,0,0,0,0,0,0,0,0,0,0];
            $total_jenis_sk_domisili = [];
            $title = 'Dashboard';
            $total_masyarakat = count(User::where('role','masyarakat')->get());
            $sk_domisili = Domisili::whereYear('created_at', date('Y'))
                            ->get()
                            ->countBy(function($val){
                                return Carbon::parse($val->created_at)->format('m');
                            });
            
            $jenis_sk_domisili = Domisili::whereYear('created_at', date('Y'))
                            ->get()
                            ->countBy(function($val){
                                return $val->jenis_domisili;
                            });
            
            $total_permohonan_sk_domisili = count(Domisili::all());
            $total_pengajuan_sk_domisili = count(Domisili::where('status','Diajukan')->get());
            $total_proses_sk_domisili = count(Domisili::where('status','Diproses')->get());

            foreach ($sk_domisili as $key => $value) {
                $total_sk_domisili[$key-1] = $value;
            }

            foreach($jenis_sk_domisili as $key => $value){
                $total_jenis_sk_domisili[$key] = $value;
            }

            $label_jenis_sk_domisili = collect(array_keys($total_jenis_sk_domisili));
            $data_jenis_sk_domisili = collect(array_values($total_jenis_sk_domisili));
            // return response()->json($data_jenis_sk_domisili);


            return view('dashboard.admin',[
                'title' => $title,
                'total_masyarakat' => $total_masyarakat,
                'total_permohonan_sk_domisili' => $total_permohonan_sk_domisili,
                'total_pengajuan_sk_domisili' => $total_pengajuan_sk_domisili,
                'total_proses_sk_domisili' => $total_proses_sk_domisili,
                'total_sk_domisili' => collect($total_sk_domisili),
                'label_jenis_sk_domisili' => $label_jenis_sk_domisili,
                'data_jenis_sk_domisili' => $data_jenis_sk_domisili,
            ]);
        }else{
            $title = 'Dashboard';
            $sk_domisili = Domisili::where('created_by', auth()->user()->id)->get();
            $sk_domisili_pengajuan = Domisili::where('created_by', auth()->user()->id)->where('status','Diajukan')->get();
            $sk_domisili_proses = Domisili::where('created_by', auth()->user()->id)->where('status','Diproses')->get();
            $sk_domisili_tolak = Domisili::where('created_by', auth()->user()->id)->where('status','Ditolak')->get();

            return view('home',[
                'title' => $title,
                'sk_domisili' => $sk_domisili,
                'sk_domisili_pengajuan' => $sk_domisili_pengajuan,
                'sk_domisili_proses' => $sk_domisili_proses,
                'sk_domisili_tolak' => $sk_domisili_tolak,
            ]);
        }
    }

    public function settings(){
        $title = 'Profile';
        $user = User::findOrFail(auth()->user()->id);
        // dd($title);
        return view('user.settings',[
            'title'=> $title,
            'user'=> $user,
        ]);
    }

    public function update_settings(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        DB::beginTransaction();
        try {
            $penduduk = $user->penduduk;
            $penduduk->nik = $request->nik;
            $penduduk->no_kk = $request->no_kk;
            $penduduk->nama = $request->nama;
            $penduduk->jenis_kelamin = $request->jenis_kelamin;
            $penduduk->tempat_lahir = $request->tempat_lahir;
            $penduduk->tanggal_lahir = $request->tanggal_lahir;
            $penduduk->status_perkawinan = $request->status_perkawinan;
            $penduduk->pendidikan = $request->pendidikan;
            $penduduk->alamat = $request->alamat;
            $penduduk->agama = $request->agama;
            $penduduk->pekerjaan = $request->pekerjaan;
            $penduduk->update();

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $avatar_name = $request->nik . ' - ' . $avatar->getClientOriginalName();
                $avatar->move(public_path('/avatars'),$avatar_name);

                $avatar_path = 'avatars/' . $avatar_name;
            }

            $user->nik = $request->nik;
            $user->email = $request->email;
            $user->avatar = $avatar_path;
            $user->update();

            DB::commit();
            return redirect()->back()->with('success', 'Profile telah berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Profile gagal diperbarui. ' . $th->getMessage());
        }
    }
    
    public function settings_password(){
        $title = 'Ganti Password';
        // dd($title);
        return view('user.settings_password',[
            'title'=> $title,
        ]);
    }
    
    public function update_settings_password(Request $request){
        $this->validate($request,[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],[
            'new_confirm_password.same' => 'Password Baru dan Konfirmasi Password Baru harus sama.'
        ]);
        
        try {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->new_password);
            $user->update();
            return redirect()->back()->with('success', 'Password telah berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Password gagal diperbarui. ' . $th->getMessage());
        }

    }
}
