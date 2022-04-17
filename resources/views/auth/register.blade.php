@extends('layouts.landing-page.master')

@push('css')
<style>
    /* #jenis_kelamin {
        color: #8D7785 !important;
        padding: 10px 15px;
        font-size: 14px;
    }
    .option{
        color: black !important;
    } */
    #jenis_kelamin { padding: 10px 15px; font-size: 14px; border-radius: 0px; }
    #jenis_kelamin option { color: black; }
    
    #status_perkawinan { padding: 10px 15px; font-size: 14px; border-radius: 0px; }
    #status_perkawinan option { color: black; }
    
    #pendidikan { padding: 10px 15px; font-size: 14px; border-radius: 0px; }
    #pendidikan option { color: black; }

    #agama { padding: 10px 15px; font-size: 14px; border-radius: 0px; }
    #agama option { color: black; }
    
    #tanggal_lahir { color: gray; }
    .empty { color: gray; }
</style>
@endpush

@section('content')
<section id="login" class="section-bg contact">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="{{ route('register') }}" method="post" class="php-email-form">
                @csrf
                <h1 class="text-center" style="color: #106eea; margin-bottom: 5px;">Daftar</h1>
                <p class="text-center"><i>Daftar untuk bisa masuk dan menggunakan fitur yang ada di dalam SIPESDA</i></p>
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                            name="nik" 
                            id="nik" 
                            value="{{ old('nik') }}" 
                            placeholder="Masukkan NIK..."
                            autofocus>
                        @error('nik')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                            name="nama" 
                            id="nama" 
                            value="{{ old('nama') }}" 
                            placeholder="Masukkan Nama...">
                        @error('nama')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            placeholder="Masukkan Email...">
                        @error('email')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="password" class="form-control" 
                        name="password" 
                        id="password"  
                        placeholder="Masukkan Password...">
                        @error('password')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="password" class="form-control" 
                        name="password_confirmation" 
                        id="password"  
                        placeholder="Masukkan Konfirmasi Password...">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                            name="jenis_kelamin" 
                            id="jenis_kelamin">
                            <option value="0" selected disabled>Masukkan Jenis Kelamin...</option>
                            <option value="Laki-Laki" class="option" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" class="option" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12" style="margin-bottom: 10px;">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                            name="tempat_lahir" 
                            id="tempat_lahir" 
                            value="{{ old('tempat_lahir') }}" 
                            placeholder="Masukkan Tempat Lahir...">
                        @error('tempat_lahir')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12" style="margin-bottom: 10px;">
                        <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                            name="tanggal_lahir" 
                            id="tanggal_lahir" 
                            value="{{ old('tanggal_lahir') }}" 
                            placeholder="Masukkan Tanggal Lahir..."
                            onfocus="(this.type = 'date')">
                        @error('tanggal_lahir')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <select class="form-control empty @error('status_perkawinan') is-invalid @enderror" 
                            name="status_perkawinan" 
                            id="status_perkawinan">
                            <option value="0" selected disabled>Masukkan Status Perkawinan...</option>
                            <option value="Belum Kawin" class="option" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" class="option" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" class="option" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" class="option" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <select class="form-control @error('pendidikan') is-invalid @enderror" 
                            name="pendidikan" 
                            id="pendidikan">
                            <option value="0" selected disabled>Masukkan Pendidikan...</option>
                            <option value="Tidak/Belum Sekolah" class="option" {{ old('pendidikan') == 'Tidak/Belum Sekolah' ? 'selected' : '' }}>Tidak/Belum Sekolah</option>
                            <option value="Tidak Tamat SD/Sederajat" class="option" {{ old('pendidikan') == 'Tidak Tamat SD/Sederajat' ? 'selected' : '' }}>Tidak Tamat SD/Sederajat</option>
                            <option value="Tamat SD/Sederajat" class="option" {{ old('pendidikan') == 'Tamat SD/Sederajat' ? 'selected' : '' }}>Tamat SD/Sederajat</option>
                            <option value="SLTP/Sederajat" class="option" {{ old('pendidikan') == 'SLTP/Sederajat' ? 'selected' : '' }}>SLTP/Sederajat</option>
                            <option value="SLTA/Sederajat" class="option" {{ old('pendidikan') == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                            <option value="Diploma I/II" class="option" {{ old('pendidikan') == 'Diploma I/II' ? 'selected' : '' }}>Diploma I/II</option>
                            <option value="Akademi/Diploma III/Sarjana Muda" class="option" {{ old('pendidikan') == 'Akademi/Diploma III/Sarjana Muda' ? 'selected' : '' }}>Akademi/Diploma III/Sarjana Muda</option>
                            <option value="Diploma IV/Strata I" class="option" {{ old('pendidikan') == 'Diploma IV/Strata I' ? 'selected' : '' }}>Diploma IV/Strata I</option>
                            <option value="Strata II" class="option" {{ old('pendidikan') == 'Strata II' ? 'selected' : '' }}>Strata II</option>
                            <option value="Strata III" class="option" {{ old('pendidikan') == 'Strata III' ? 'selected' : '' }}>Strata III</option>
                        </select>
                        @error('pendidikan')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                            name="alamat" 
                            id="alamat" rows="2" 
                            placeholder="Masukkan Alamat...">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <select class="form-control @error('agama') is-invalid @enderror" 
                            name="agama" 
                            id="agama">
                            <option value="0" selected disabled>Masukkan Agama...</option>
                            <option value="Islam" class="option" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Protestan" class="option" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="Katolik" class="option" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" class="option" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" class="option" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Khonghucu" class="option" {{ old('agama') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                        </select>
                        @error('agama')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                            name="pekerjaan" 
                            id="pekerjaan" 
                            value="{{ old('pekerjaan') }}" 
                            placeholder="Masukkan Pekerjaan...">
                        @error('pekerjaan')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="padding: 0;" required>
                            <label class="form-check-label" for="flexCheckDefault" style="font-size: 14px;">
                                Saya telah mengisi biodata diri saya sesuai dengan data diri yang tertera di Kartu Tanda Penduduk dan Kartu Keluarga saya. 
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="col-md-12">
                        <!-- <button type="submit">test</button> -->
                        <button type="submit" style="width:100%;" class="mb-2">Daftar</button>
                        <p class="mb-0" style="font-size: 15px;">Sudah punya akun? Masuk <a href="{{ route('login') }}">disini</a>!</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>
@endsection

@push('js')

<script>
    let jenis_kelamin = document.getElementById('jenis_kelamin');
    let status_perkawinan = document.getElementById('status_perkawinan');
    let pendidikan = document.getElementById('pendidikan');
    let agama = document.getElementById('agama');
    
    jenis_kelamin.addEventListener("change", function(){
        if(jenis_kelamin.value != "0"){
            jenis_kelamin.classList.remove("empty")
        }else{
            jenis_kelamin.classList.add("empty")
        }
    });

    status_perkawinan.addEventListener("change", function(){
        if(status_perkawinan.value != "0"){
            status_perkawinan.classList.remove("empty")
        }else{
            status_perkawinan.classList.add("empty")
        }
    });

    pendidikan.addEventListener("change", function(){
        if(pendidikan.value != "0"){
            pendidikan.classList.remove("empty")
        }else{
            pendidikan.classList.add("empty")
        }
    });

    agama.addEventListener("change", function(){
        if(agama.value != "0"){
            agama.classList.remove("empty")
        }else{
            agama.classList.add("empty")
        }
    });
    
    window.addEventListener("load", function(){
        if(jenis_kelamin.value != "0"){
            jenis_kelamin.classList.remove("empty")
        }else{
            jenis_kelamin.classList.add("empty")
        }

        if(status_perkawinan.value != "0"){
            status_perkawinan.classList.remove("empty")
        }else{
            status_perkawinan.classList.add("empty")
        }

        if(pendidikan.value != "0"){
            pendidikan.classList.remove("empty")
        }else{
            pendidikan.classList.add("empty")
        }

        if(agama.value != "0"){
            agama.classList.remove("empty")
        }else{
            agama.classList.add("empty")
        }
    });
    // $("#jenis_kelamin").change(function () {
    //     if($(this).val() == "0") $(this).addClass("empty");
    //     else $(this).removeClass("empty")
    // });
    
    // $("#jenis_kelamin").change();
</script>
@endpush
