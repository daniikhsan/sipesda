@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <!-- <a href="{{ route('user.settings_password') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-key fa-sm text-white-50"></i> Ganti Password</a> -->
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
        <div class="card">
            <div class="card-header">Ganti Password</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.update_settings_password') }}" method="post">
                            @csrf 
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Sekarang</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Input Password Sekarang...">
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Input Password Baru...">
                                @error('new_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_confirm_password" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" id="new_confirm_password" name="new_confirm_password" placeholder="Input Konfirmasi Password Baru...">
                                @error('new_confirm_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success float-right"><i class="fas fa-save mr-2"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
