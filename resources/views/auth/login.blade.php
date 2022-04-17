@extends('layouts.landing-page.master')

@section('content')
<section id="login" class="section-bg contact">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('login') }}" method="post" class="php-email-form">
                @csrf
                <h1 class="text-center" style="color: #106eea; margin-bottom: 5px;">Masuk</h1>
                <p class="text-center"><i>Masuk untuk bisa menggunakan fitur yang ada di dalam SIPESDA</i></p>
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                            name="username" 
                            id="username" 
                            value="{{ old('username') }}" 
                            placeholder="Masukkan Email/NIK..." 
                            autofocus>
                        @error('username')
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
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <!-- <button type="submit">test</button> -->
                        <button type="submit" style="width:100%;" class="mb-2">Masuk</button>
                        <p class="mb-0" style="font-size: 15px;">Belum punya akun? Daftar <a href="{{ route('register') }}">disini</a>!</p>
                        <p class="mb-0" style="font-size: 15px;"><a href="#">Lupa Password</a></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</section>
@endsection
