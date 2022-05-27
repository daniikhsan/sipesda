<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Penduduk;

use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Admin';
        $admins = User::where('role','admin')->orWhere('role','super_admin')->get();

        return view('admin.index',[
            'title' => $title,
            'admins' => $admins,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Admin';
    
        return view('admin.create',[
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $penduduk = Penduduk::create([
                'nik' => $request->nik,
                'no_kk' => $request->no_kk,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status_perkawinan' => $request->status_perkawinan,
                'pendidikan' => $request->pendidikan,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'pekerjaan' => $request->pekerjaan
            ]);

            $user = User::create([
                'nik' => $request->nik,
                'nip' => $request->nip,
                'email' => $request->email,
                'jabatan_perangkat_desa' => $request->jabatan_perangkat_desa,
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]);
            DB::commit();
            return redirect()->route('admin.index')->with('success', 'Admin telah berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.create')->with('error', 'Admin gagal ditambahkan. ' . $th->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit Admin';

        return view('admin.edit',[
            'title' => $title,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

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

            $user->nik = $request->nik;
            $user->nip = $request->nip;
            $user->email = $request->email;
            $user->jabatan_perangkat_desa = $request->jabatan_perangkat_desa;
            $user->role = 'admin';
            $user->update();

            DB::commit();
            return redirect()->route('admin.index')->with('success', 'Admin telah berhasil diperbarui.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.edit', $id)->with('error', 'Admin gagal diperbarui. ' . $th->getMessage());
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Admin telah berhasil dihapus.');
    }
}
