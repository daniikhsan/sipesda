@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p>Halaman untuk mengolah data Surat Keterangan Domisili</p>
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
                <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Surat Keterangan Domisili</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('domisili.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis_domisili" class="form-label">Jenis Surat Keterangan Domisili</label>
                        <select name="jenis_domisili" id="jenis_domisili" class="form-control @error('jenis_domisili') is-invalid @enderror" required>
                            <option value="" selected disabled>Pilih Jenis Surat Keterangan Domisili</option>
                            <option value="Penduduk" {{ old('jenis_domisili') == 'Penduduk' ? 'selected' : '' }}>Penduduk</option>
                            <option value="Persyaratan" {{ old('jenis_domisili') == 'Persyaratan' ? 'selected' : '' }}>Persyaratan</option>
                            <option value="Usaha" {{ old('jenis_domisili') == 'Usaha' ? 'selected' : '' }}>Usaha</option>
                            <option value="Lainnya" {{ old('jenis_domisili') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_domisili')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_nik" style="display:none;">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Input NIK...">
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_nama" style="display:none;">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Input nama...">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_tempat_tanggal_lahir" style="display:none;">
                        <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir" value="{{ old('tempat_tanggal_lahir') }}" placeholder="Input Tempat Tanggal Lahir...">
                        @error('tempat_tanggal_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_jenis_kelamin" style="display:none;">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_agama" style="display:none;">
                        <label for="agama" class="form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_status_perkawinan" style="display:none;">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror">
                            <option selected disabled>Pilih Status Perkawinan</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_pekerjaan" style="display:none;">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Input Pekerjaan...">
                        @error('pekerjaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_alamat_asal" style="display:none;">
                        <label for="alamat_asal" class="form-label">Alamat Asal</label>
                        <input type="text" class="form-control @error('alamat_asal') is-invalid @enderror" id="alamat_asal" name="alamat_asal" value="{{ old('alamat_asal') }}" placeholder="Input Alamat Asal...">
                        @error('alamat_asal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_alamat_domisili" style="display:none;">
                        <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
                        <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" name="alamat_domisili" value="{{ old('alamat_domisili') }}" placeholder="Input Alamat Domisili...">
                        @error('alamat_domisili')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_masa_berlaku" style="display:none;">
                        <label for="tanggal_berlaku" class="form-label">Masa Berlaku</label>
                        <input type="date" class="form-control @error('tanggal_berlaku') is-invalid @enderror" id="tanggal_berlaku" name="tanggal_berlaku" value="{{ old('tanggal_berlaku') }}" placeholder="Input Masa Berlaku...">
                        @error('tanggal_berlaku')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_nama_usaha" style="display:none;">
                        <label for="nama_usaha" class="form-label">Nama Usaha/Tempat</label>
                        <input type="text" class="form-control @error('nama_usaha') is-invalid @enderror" id="nama_usaha" name="nama_usaha" value="{{ old('nama_usaha') }}" placeholder="Input Nama Usaha/Tempat...">
                        @error('nama_usaha')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_bidang_usaha" style="display:none;">
                        <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                        <input type="text" class="form-control @error('bidang_usaha') is-invalid @enderror" id="bidang_usaha" name="bidang_usaha" value="{{ old('bidang_usaha') }}" placeholder="Input Bidang Usaha...">
                        @error('bidang_usaha')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_mulai_usaha" style="display:none;">
                        <label for="mulai_usaha" class="form-label">Mulai Usaha</label>
                        <input type="date" class="form-control @error('mulai_usaha') is-invalid @enderror" id="mulai_usaha" name="mulai_usaha" value="{{ old('mulai_usaha') }}" placeholder="Input Mulai Usaha...">
                        @error('mulai_usaha')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3" id="input_keterangan" style="display:none;">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Input Keterangan...">
                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Surat</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="" selected disabled>Pilih Status Surat</option>
                            <option value="Diajukan" {{ old('status') == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                            <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Perbaikan" {{ old('status') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save mr-2"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    let jenis_domisili = $('#jenis_domisili');
    let input_nik = $('#input_nik');
    let input_nama = $('#input_nama');
    let input_tempat_tanggal_lahir = $('#input_tempat_tanggal_lahir');
    let input_jenis_kelamin = $('#input_jenis_kelamin');
    let input_agama = $('#input_agama');
    let input_pekerjaan = $('#input_pekerjaan');
    let input_alamat_asal = $('#input_alamat_asal');
    let input_alamat_domisili = $('#input_alamat_domisili');
    let input_masa_berlaku = $('#input_masa_berlaku');
    let input_nama_usaha = $('#input_nama_usaha');
    let input_bidang_usaha = $('#input_bidang_usaha');
    let input_mulai_usaha = $('#input_mulai_usaha');
    let input_status_perkawinan = $('#input_status_perkawinan');
    let input_keterangan = $('#input_keterangan');
    
    let nik = $('#nik');
    let nama = $('#nama');
    let tempat_tanggal_lahir = $('#tempat_tanggal_lahir');
    let jenis_kelamin = $('#jenis_kelamin');
    let agama = $('#agama');
    let pekerjaan = $('#pekerjaan');
    let alamat_asal = $('#alamat_asal');
    let alamat_domisili = $('#alamat_domisili');
    let masa_berlaku = $('#masa_berlaku');
    let nama_usaha = $('#nama_usaha');
    let bidang_usaha = $('#bidang_usaha');
    let mulai_usaha = $('#mulai_usaha');
    let status_perkawinan = $('#status_perkawinan');
    let keterangan = $('#keterangan');
    
    function removeValueAllInput(){
        nik.val('')
        nama.val('')
        tempat_tanggal_lahir.val('')
        jenis_kelamin.val('')
        agama.val('')
        pekerjaan.val('')
        alamat_asal.val('')
        alamat_domisili.val('')
        masa_berlaku.val('')
        nama_usaha.val('')
        bidang_usaha.val('')
        mulai_usaha.val('')
        status_perkawinan.val('')
        keterangan.val('')
    }

    function hideAllInput(){
        input_nik.hide()
        input_nama.hide()
        input_tempat_tanggal_lahir.hide()
        input_jenis_kelamin.hide()
        input_agama.hide()
        input_pekerjaan.hide()
        input_alamat_asal.hide()
        input_alamat_domisili.hide()
        input_masa_berlaku.hide()
        input_nama_usaha.hide()
        input_bidang_usaha.hide()
        input_mulai_usaha.hide()
        input_status_perkawinan.hide()
        input_keterangan.hide()

        nik.removeAttr('required')
        nama.removeAttr('required')
        tempat_tanggal_lahir.removeAttr('required')
        jenis_kelamin.removeAttr('required')
        agama.removeAttr('required')
        pekerjaan.removeAttr('required')
        alamat_asal.removeAttr('required')
        alamat_domisili.removeAttr('required')
        masa_berlaku.removeAttr('required')
        nama_usaha.removeAttr('required')
        bidang_usaha.removeAttr('required')
        mulai_usaha.removeAttr('required')
        status_perkawinan.removeAttr('required')
        keterangan.removeAttr('required')

       
    }

    function PendudukForm(){
        input_nama.show()
        input_nik.show()
        input_tempat_tanggal_lahir.show()
        input_jenis_kelamin.show()
        input_agama.show()
        input_status_perkawinan.show()
        input_pekerjaan.show()
        input_alamat_asal.show()
        input_alamat_domisili.show()
        input_masa_berlaku.show()

        nama.attr('required','true')
        nik.attr('required','true')
        tempat_tanggal_lahir.attr('required','true')
        jenis_kelamin.attr('required','true')
        agama.attr('required','true')
        status_perkawinan.attr('required','true')
        pekerjaan.attr('required','true')
        alamat_asal.attr('required','true')
        alamat_domisili.attr('required','true')
        masa_berlaku.attr('required','true')
    }

    function PersyaratanForm(){
        input_nama.show()
        input_nik.show()
        input_tempat_tanggal_lahir.show()
        input_jenis_kelamin.show()
        input_agama.show()
        input_status_perkawinan.show()
        input_pekerjaan.show()
        input_alamat_asal.show()
        input_alamat_domisili.show()
        input_keterangan.show()
        
        nama.attr('required','true')
        nik.attr('required','true')
        tempat_tanggal_lahir.attr('required','true')
        jenis_kelamin.attr('required','true')
        agama.attr('required','true')
        status_perkawinan.attr('required','true')
        pekerjaan.attr('required','true')
        alamat_asal.attr('required','true')
        alamat_domisili.attr('required','true')
        keterangan.attr('required','true')
    }

    function UsahaForm(){
        input_nama.show()
        input_nik.show()
        input_tempat_tanggal_lahir.show()
        input_jenis_kelamin.show()
        input_agama.show()
        input_status_perkawinan.show()
        input_pekerjaan.show()
        input_alamat_asal.show()
        
        input_nama_usaha.show()
        input_bidang_usaha.show()
        input_mulai_usaha.show()
        input_alamat_domisili.show()

        nama.attr('required','true')
        nik.attr('required','true')
        tempat_tanggal_lahir.attr('required','true')
        jenis_kelamin.attr('required','true')
        agama.attr('required','true')
        status_perkawinan.attr('required','true')
        pekerjaan.attr('required','true')
        alamat_asal.attr('required','true')
        
        nama_usaha.attr('required','true')
        bidang_usaha.attr('required','true')
        mulai_usaha.attr('required','true')
        alamat_domisili.attr('required','true')
    }

    function LainnyaForm(){
        input_nama_usaha.show()
        input_nik.show()
        input_nama.show()
        input_alamat_domisili.show()

        nik.attr('required','true')
        nama_usaha.attr('required','true')
        nama.attr('required','true')
        alamat_domisili.attr('required','true')
    }

    jenis_domisili.change(function(){ 
        let value = jenis_domisili.val()
        hideAllInput()
        removeValueAllInput()
        if(value == 'Penduduk'){
            PendudukForm()
        }else if(value == 'Persyaratan'){
            PersyaratanForm()
        }else if(value == 'Usaha'){
            UsahaForm()
        }else{
            LainnyaForm()
        }
    });
</script>
@endpush