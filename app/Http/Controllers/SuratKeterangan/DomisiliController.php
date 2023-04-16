<?php

namespace App\Http\Controllers\SuratKeterangan;

use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\SuratKeterangan\Domisili;
use App\Models\Berkas;

class DomisiliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Surat Keterangan Domisili';
        if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin'){
            $domisili = Domisili::orderBy('created_at','desc')->get();
        }else{
            $domisili = Domisili::where('created_by',auth()->user()->id)->orderBy('created_at','desc')->get();
        }

        return view('surat-keterangan.domisili.index',[
            'title' => $title,
            'domisili' => $domisili,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Surat Keterangan Domisili';

        return view('surat-keterangan.domisili.create',[
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $berkas = null;
        $jenis_domisili = $request->jenis_domisili;
        
        if($jenis_domisili == 'Penduduk'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'alamat_domisili' => 'required',
                'tanggal_berlaku' => 'required',
            ]);
        }else if($jenis_domisili == 'Persyaratan'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'alamat_domisili' => 'required',
                'keterangan' => 'required',
            ]);
        }else if($jenis_domisili == 'Usaha'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'nama_usaha' => 'required',
                'bidang_usaha' => 'required',
                'mulai_usaha' => 'required',
                'alamat_domisili' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'nama_usaha' => 'required',
                'alamat_domisili' => 'required',
            ]);
        }
        
        try {

            $sk_domisili_terbaru = Domisili::orderBy('created_at','desc')->first();
            if($sk_domisili_terbaru == null){
                $no_surat = 1;
            }else{
                $no_surat = $sk_domisili_terbaru->no_surat + 1;
            }
            
            if($request->hasFile('berkas')){
                $file = $request->file('berkas');
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/'.$no_surat .'/',$filename);

                $berkas = 'storage/'.$no_surat .'/'. $filename;
            }

            if(auth()->user()->role == 'masyarakat'){
                $status = 'Diajukan';
            }else{
                $status = $request->status;
            }

            $sk_domisili = Domisili::create([
                'no_surat' => $no_surat,
                'nik' =>  auth()->user()->role == 'masyarakat' ? auth()->user()->nik : ($request->nik ? $request->nik : null),
                'nama' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->nama : ($request->nama ? $request->nama : null),
                'tempat_tanggal_lahir' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->tempat_lahir . ', ' .  auth()->user()->tanggal_lahir : ($request->tempat_tanggal_lahir ? $request->tempat_tanggal_lahir : null),
                'jenis_kelamin' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->jenis_kelamin : ($request->jenis_kelamin ? $request->jenis_kelamin : null),
                'agama' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->agama : ($request->agama ? $request->agama : null),
                'status_perkawinan' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->status_perkawinan : ($request->status_perkawinan ? $request->status_perkawinan : null),
                'pekerjaan' => auth()->user()->role == 'masyarakat' ? auth()->user()->penduduk->pekerjaan : ($request->pekerjaan ? $request->pekerjaan : null),
                'alamat_asal' => $request->alamat_asal ? $request->alamat_asal : null,
                'alamat_domisili' => $request->alamat_domisili ? $request->alamat_domisili : null,
                'jenis_domisili' => $request->jenis_domisili ? $request->jenis_domisili : null,
                'tanggal_berlaku' => $request->tanggal_berlaku ? $request->tanggal_berlaku : null,
                'nama_usaha' => $request->nama_usaha ? $request->nama_usaha : null,
                'bidang_usaha' => $request->bidang_usaha ? $request->bidang_usaha : null,
                'mulai_usaha' => $request->mulai_usaha ? $request->mulai_usaha : null,
                'status' => $status,
                'keterangan' => $request->keterangan ? $request->keterangan : null,
                'created_by' => auth()->user()->id,
                'approved_by' => auth()->user()->role == 'super_admin' || auth()->user()->role == 'admin' ? auth()->user()->id : null,
                'berkas' => $berkas
            ]);
            // dd($sk_domisili);
            return redirect()->route('domisili.index')->with('success', 'Pengajuan Surat Keterangan Domisili telah berhasil ditambahkan.');
        } catch (\Throwable $th) {
            return redirect()->route('domisili.create')->with('error', 'Pengajuan Surat Keterangan Domisili gagal ditambahkan. '. $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sk_domisili = Domisili::findOrFail($id);
        $title = 'Surat Keterangan Domisili';

        return view('surat-keterangan.domisili.show',[
            'title' => $title,
            'sk_domisili' => $sk_domisili,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sk_domisili = Domisili::findOrFail($id);
        $title = 'Edit Surat Keterangan Domisili';

        return view('surat-keterangan.domisili.edit',[
            'title' => $title,
            'sk_domisili' => $sk_domisili,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sk_domisili = Domisili::findOrFail($id);
        $jenis_domisili = $request->jenis_domisili;
        
        if($jenis_domisili == 'Penduduk'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'alamat_domisili' => 'required',
                'tanggal_berlaku' => 'required',
            ]);
        }elseif($jenis_domisili == 'Persyaratan'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'alamat_domisili' => 'required',
                'keterangan' => 'required',
            ]);
        }elseif($jenis_domisili == 'Usaha'){
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'tempat_tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat_asal' => 'required',
                'nama_usaha' => 'required',
                'bidang_usaha' => 'required',
                'mulai_usaha' => 'required',
                'alamat_domisili' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'nik' => 'required',
                'nama' => 'required',
                'nama_usaha' => 'required',
                'alamat_domisili' => 'required',
            ]);
        }
        try {
            $sk_domisili->nik = $request->nik ? $request->nik : null;
            $sk_domisili->nama = $request->nama ? $request->nama : null;
            $sk_domisili->tempat_tanggal_lahir = $request->tempat_tanggal_lahir ? $request->tempat_tanggal_lahir : null;
            $sk_domisili->jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : null;
            $sk_domisili->agama = $request->agama ? $request->agama : null;
            $sk_domisili->status_perkawinan = $request->status_perkawinan ? $request->status_perkawinan : null;
            $sk_domisili->pekerjaan = $request->pekerjaan ? $request->pekerjaan : null;
            $sk_domisili->alamat_asal = $request->alamat_asal ? $request->alamat_asal : null;
            $sk_domisili->alamat_domisili = $request->alamat_domisili ? $request->alamat_domisili : null;
            $sk_domisili->jenis_domisili = $request->jenis_domisili ? $request->jenis_domisili : null;
            $sk_domisili->tanggal_berlaku = $request->tanggal_berlaku ? $request->tanggal_berlaku : null;
            $sk_domisili->nama_usaha = $request->nama_usaha ? $request->nama_usaha : null;
            $sk_domisili->bidang_usaha = $request->bidang_usaha ? $request->bidang_usaha : null;
            $sk_domisili->mulai_usaha = $request->mulai_usaha ? $request->mulai_usaha : null;
            $sk_domisili->status = $request->status ? $request->status : null;
            $sk_domisili->keterangan = $request->keterangan ? $request->keterangan : null;
            $sk_domisili->update();
            return redirect()->route('domisili.index')->with('success', 'Pengajuan Surat Keterangan Domisili telah berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->route('domisili.edit', $id)->with('error', 'Pengajuan Surat Keterangan Domisili gagal diperbarui. '. $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domisili = Domisili::findOrFail($id);
        $domisili->delete();

        return redirect()->route('domisili.index')->with('success', 'Domisili telah berhasil dihapus.');
    }

    public function export_pdf($id){
        $domisili = Domisili::findOrFail($id);

        $pdf = PDF::loadView('surat-keterangan.domisili.pdf.' . strtolower($domisili->jenis_domisili),['domisili' => $domisili]);
    	return $pdf->stream();
    }

    public function bukti_registrasi($id){
        $domisili = Domisili::findOrFail($id);
        if($domisili->created_by == auth()->user()->id){
            $pdf = PDF::loadView('surat-keterangan.domisili.pdf.bukti-registrasi.' . strtolower($domisili->jenis_domisili),['domisili' => $domisili]);
            return $pdf->stream();
        }else{
            return redirect()->back();
        }
    }

    public function edit_status($id){
        $sk_domisili = Domisili::findOrFail($id);
        $title = 'Edit Status Surat Keterangan Domisili';

        return view('surat-keterangan.domisili.edit_status',[
            'title' => $title,
            'sk_domisili' => $sk_domisili,
        ]);
    }

    public function update_status(Request $request, $id){
        $sk_domisili = Domisili::findOrFail($id);
        try {
            $sk_domisili->status = $request->status;
            $sk_domisili->update();
            return redirect()->route('domisili.index')->with('success', 'Status Pengajuan Surat Keterangan Domisili telah berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->route('domisili.edit_status', $id)->with('error', 'Status Pengajuan Surat Keterangan Domisili gagal diperbarui. '. $th->getMessage());
        }
    }
}
