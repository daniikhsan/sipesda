<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SuratKeterangan\Domisili;

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
        if(auth()->user()->role == 'admin'){
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
            return view('home',compact('title'));
        }
    }
}
