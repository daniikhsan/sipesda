@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p>Halaman untuk mengolah data Admin</p>
    </div>
    <div class="col-md-4">
        <!-- <a href="{{ route('admin.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Admin</a> -->
    </div>
</div>

@if(Session::get('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="fas fa-check fa-sm mr-2"></i>
        <div>
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if(Session::get('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle fa-sm mr-2"></i>
        <div>
            {{ Session::get('error') }}
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Admin</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $user->nik) }}" placeholder="Input NIK...">
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" placeholder="Input NIP...">
                        @error('nip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_kk" class="form-label">No Kartu Keluarga</label>
                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{ old('no_kk', $user->penduduk->no_kk) }}" placeholder="Input No Kartu Keluarga...">
                        @error('no_kk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->penduduk->nama) }}" placeholder="Input Nama...">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_perangkat_desa" class="form-label">Posisi</label>
                        <input type="text" class="form-control @error('jabatan_perangkat_desa') is-invalid @enderror" id="jabatan_perangkat_desa" name="jabatan_perangkat_desa" value="{{ old('jabatan_perangkat_desa', $user->jabatan_perangkat_desa) }}" placeholder="Input Posisi...">
                        @error('jabatan_perangkat_desa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Input Email...">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin', $user->penduduk->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $user->penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->penduduk->tempat_lahir) }}" placeholder="Input Tempat Lahir...">
                                @error('tempat_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-9">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->penduduk->tanggal_lahir) }}" placeholder="Input Tanggal Lahir...">
                                @error('tanggal_lahir')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror">
                            <option selected disabled>Pilih Status Perkawinan</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan', $user->penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan', $user->penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan', $user->penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan', $user->penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                            <option selected disabled>Pilih Pendidikan</option>
                            <option value="Tidak/Belum Sekolah" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                            <option value="Tidak Tamat SD/Sederajat" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Tidak Tamat SD/Sederajat' ? 'selected' : '' }}>Tidak Tamat SD/Sederajat</option>
                            <option value="Tamat SD/Sederajat" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                            <option value="SLTP/Sederajat" {{ old('pendidikan', $user->penduduk->pendidikan) == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
                            <option value="SLTA/Sederajat" {{ old('pendidikan', $user->penduduk->pendidikan) == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                            <option value="Diploma I/II" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Diploma I/II' ? 'selected' : '' }}>Diploma I/II</option>
                            <option value="Akademi/Diploma III/Sarjana Muda" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Akademi/Diploma III/Sarjana Muda' ? 'selected' : '' }}>Akademi/Diploma III/Sarjana Muda</option>
                            <option value="Diploma IV/Strata I" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Diploma IV/Strata I' ? 'selected' : '' }}>Diploma IV/Strata I</option>
                            <option value="Strata II" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Strata II' ? 'selected' : '' }}>Strata II</option>
                            <option value="Strata III" {{ old('pendidikan', $user->penduduk->pendidikan) == 'Strata III' ? 'selected' : '' }}>Strata III</option>
                        </select>
                        @error('pendidikan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->penduduk->alamat) }}" placeholder="Input Alamat...">
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam" {{ old('agama', $user->penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Protestan" {{ old('agama', $user->penduduk->agama) == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="Katholik" {{ old('agama', $user->penduduk->agama) == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                            <option value="Hindu" {{ old('agama', $user->penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama', $user->penduduk->agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option value="Konghucu" {{ old('agama', $user->penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $user->penduduk->pekerjaan) }}" placeholder="Input Pekerjaan...">
                        @error('pekerjaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save mr-2"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
