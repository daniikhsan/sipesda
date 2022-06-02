@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p>470/{{ str_pad($sk_domisili->no_surat, 3, 0, STR_PAD_LEFT) }}/Pem-DG | {{ $sk_domisili->approved_by != null ? 'Telah Disetujui' : 'Belum Disetujui'}} | {{ $sk_domisili->status }} </p>
    </div>
    <div class="col-md-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50 mr-2"></i> Bukti Registrasi</a>
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col md-6">
                        <div class="mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" value="{{ $sk_domisili->nik }}" readonly>
                        </div>
                    </div>
                    <div class="col md-6">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="{{ $sk_domisili->nama }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" value="{{ $sk_domisili->nama }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection