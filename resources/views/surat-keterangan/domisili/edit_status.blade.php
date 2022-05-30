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
                <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Surat Keterangan Domisili</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('domisili.update_status', $sk_domisili->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-responsive" width="100%">
                                <tr>
                                    <th width="20%">No. Surat</th>
                                    <td width="80%">{{ str_pad($sk_domisili->no_surat, 3, 0, STR_PAD_LEFT) }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">NIK</th>
                                    <td width="80%">{{ $sk_domisili->nik }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Nama</th>
                                    <td width="80%">{{ $sk_domisili->nama }}</td>
                                </tr>
                                @if($sk_domisili->jenis_domisili == 'Penduduk')
                                    <tr>
                                        <th width="20%">Jenis Kelamin</th>
                                        <td width="80%">{{ $sk_domisili->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Status Perkawinan</th>
                                        <td width="80%">{{ $sk_domisili->status_perkawinan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Pekerjaan</th>
                                        <td width="80%">{{ $sk_domisili->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Asal</th>
                                        <td width="80%">{{ $sk_domisili->alamat_asal }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Domisili</th>
                                        <td width="80%">{{ $sk_domisili->alamat_domisili }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Masa Berlaku</th>
                                        <td width="80%">{{ \Carbon\Carbon::parse($sk_domisili->tanggal_berlaku)->format('d M Y') }}</td>
                                    </tr>
                                @elseif($sk_domisili->jenis_domisili == 'Persyaratan')
                                    <tr>
                                        <th width="20%">Jenis Kelamin</th>
                                        <td width="80%">{{ $sk_domisili->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Status Perkawinan</th>
                                        <td width="80%">{{ $sk_domisili->status_perkawinan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Pekerjaan</th>
                                        <td width="80%">{{ $sk_domisili->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Asal</th>
                                        <td width="80%">{{ $sk_domisili->alamat_asal }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Domisili</th>
                                        <td width="80%">{{ $sk_domisili->alamat_domisili }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Masa Berlaku</th>
                                        <td width="80%">{{ \Carbon\Carbon::parse($sk_domisili->tanggal_berlaku)->format('d M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Keterangan</th>
                                        <td width="80%">{{ $sk_domisili->keterangan }}</td>
                                    </tr>
                                @elseif($sk_domisili->jenis_domisili == 'Usaha')
                                    <tr>
                                        <th width="20%">Jenis Kelamin</th>
                                        <td width="80%">{{ $sk_domisili->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Status Perkawinan</th>
                                        <td width="80%">{{ $sk_domisili->status_perkawinan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Pekerjaan</th>
                                        <td width="80%">{{ $sk_domisili->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Asal</th>
                                        <td width="80%">{{ $sk_domisili->alamat_asal }}</td>
                                    </tr>

                                    <tr>
                                        <th width="20%">Nama Usaha</th>
                                        <td width="80%">{{ $sk_domisili->nama_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Bidang Usaha</th>
                                        <td width="80%">{{ $sk_domisili->bidang_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Mulai Usaha</th>
                                        <td width="80%">Tahun {{ \Carbon\Carbon::parse($sk_domisili->mulai_usaha)->format('Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Domisili</th>
                                        <td width="80%">{{ $sk_domisili->alamat_domisili }}</td>
                                    </tr>
                                @else 
                                    <tr>
                                        <th width="20%">Nama Tempat/Usaha</th>
                                        <td width="80%">{{ $sk_domisili->nama_usaha }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Alamat Domisili</th>
                                        <td width="80%">{{ $sk_domisili->alamat_domisili }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Surat</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="" selected disabled>Pilih Status Surat</option>
                                    <option value="Diajukan" {{ old('status', $sk_domisili->status) == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                    <option value="Diproses" {{ old('status', $sk_domisili->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Perbaikan" {{ old('status', $sk_domisili->status) == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                    <option value="Selesai" {{ old('status', $sk_domisili->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Dibatalkan" {{ old('status', $sk_domisili->status) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save mr-2"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
