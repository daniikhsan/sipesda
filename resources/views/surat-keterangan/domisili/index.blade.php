@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p>Halaman untuk mengolah data Surat Keterangan Domisili</p>
    </div>
    <div class="col-md-4">
        <a href="{{ route('domisili.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengajuan</a>
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

<!-- DataTales domisili -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List domisili</h6>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th width="100px">No. Surat</th>
                        <th>Pemohon</th>
                        <th>Status</th>
                        <th>Diajukan</th>
                        <th width="400px">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th width="100px">No. Surat</th>
                        <th>Pemohon</th>
                        <th>Status</th>
                        <th>Diajukan</th>
                        <th width="400px">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($domisili as $domisili)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ str_pad($domisili->no_surat, 3, 0, STR_PAD_LEFT) }}</td>
                            <td class="text-center">{{ $domisili->nama }} ({{ $domisili->nik }})</td>
                            <td class="text-center">
                                @if($domisili->status == 'Diajukan')
                                <span class="badge badge-light">{{ Str::title($domisili->status) }} </span>
                                @elseif($domisili->status == 'Diproses')
                                <span class="badge badge-secondary">{{ Str::title($domisili->status) }} </span>
                                @elseif($domisili->status == 'Perbaikan')
                                <span class="badge badge-warning">{{ Str::title($domisili->status) }} </span>
                                @elseif($domisili->status == 'Selesai')
                                <span class="badge badge-success">{{ Str::title($domisili->status) }} </span>
                                @else
                                <span class="badge badge-danger">{{ Str::title($domisili->status) }} </span>
                                @endif
                            </td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($domisili->created_at)->format('d M Y H:i:s') }}</td>
                            <td class="text-center" width="400px">
                                <div class="btn btn-toolbar justify-content-center">
                                    <a href="{{ route('domisili.edit_status', $domisili->id) }}" class="btn btn-success btn-sm mr-2 {{ $domisili->status == 'Selesai' || $domisili->status == 'Dibatalkan'  ? 'disabled' : '' }}"><i class="fas fa-redo"></i> Update Status</a>
                                    <button type="button" class="btn btn-secondary btn-sm mr-2" data-toggle="modal" data-target="#exampleModal-{{ $domisili->id }}">
                                        <i class="fas fa-eye"></i> Detail
                                    </button><br>
                                    <a href="{{ route('domisili.edit', $domisili->id) }}" class="btn btn-primary btn-sm mr-2 {{ $domisili->status != 'Diajukan' ? 'disabled' : '' }}"><i class="fas fa-pen"></i> Edit</a>
                                    <form action="{{ route('domisili.destroy', $domisili->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm {{ $domisili->status != 'Diajukan' ? 'disabled' : '' }}" {{ $domisili->status != 'Diajukan' ? 'disabled' : '' }}><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $domisili->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal-{{ $domisili->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal-{{ $domisili->id }}Label">470/{{ str_pad($domisili->no_surat, 3, 0, STR_PAD_LEFT) }}/Pem-DG | {{ $domisili->status }}</h5>
                                <br>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-1">
                                            <small>No. Surat</small>
                                            <p>470/{{ str_pad($domisili->no_surat, 3, 0, STR_PAD_LEFT) }}/Pem-DG</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Status Surat</small>
                                            <p>{{ $domisili->status }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>NIK</small>
                                            <p>{{ $domisili->nik }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Nama</small>
                                            <p>{{ $domisili->nama }}</p>
                                        </div>
                                        @if($domisili->jenis_domisili == 'Penduduk')
                                        <div class="mb-1">
                                            <small>Tempat, Tanggal Lahir</small>
                                            <p>{{ $domisili->tempat_tanggal_lahir }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Jenis Kelamin</small>
                                            <p>{{ $domisili->jenis_kelamin }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Agama</small>
                                            <p>{{ $domisili->agama }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Status Perkawinan</small>
                                            <p>{{ $domisili->status_perkawinan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Pekerjaan</small>
                                            <p>{{ $domisili->pekerjaan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Asal</small>
                                            <p>{{ $domisili->alamat_asal }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Domisili</small>
                                            <p>{{ $domisili->alamat_domisili }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Masa Berlaku</small>
                                            <p>{{ \Carbon\Carbon::parse($domisili->tanggal_berlaku)->format('d M Y') }}</p>
                                        </div>
                                        @elseif($domisili->jenis_domisili == 'Persyaratan')
                                        <div class="mb-1">
                                            <small>Tempat, Tanggal Lahir</small>
                                            <p>{{ $domisili->tempat_tanggal_lahir }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Jenis Kelamin</small>
                                            <p>{{ $domisili->jenis_kelamin }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Agama</small>
                                            <p>{{ $domisili->agama }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Status Perkawinan</small>
                                            <p>{{ $domisili->status_perkawinan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Pekerjaan</small>
                                            <p>{{ $domisili->pekerjaan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Asal</small>
                                            <p>{{ $domisili->alamat_asal }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Domisili</small>
                                            <p>{{ $domisili->alamat_domisili }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Keterangan</small>
                                            <p>{{ $domisili->keterangan }}</p>
                                        </div>
                                        @elseif($domisili->jenis_domisili == 'Usaha')
                                        <div class="mb-1">
                                            <small>Tempat, Tanggal Lahir</small>
                                            <p>{{ $domisili->tempat_tanggal_lahir }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Jenis Kelamin</small>
                                            <p>{{ $domisili->jenis_kelamin }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Agama</small>
                                            <p>{{ $domisili->agama }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Status Perkawinan</small>
                                            <p>{{ $domisili->status_perkawinan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Pekerjaan</small>
                                            <p>{{ $domisili->pekerjaan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Asal</small>
                                            <p>{{ $domisili->alamat_asal }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Nama Usaha</small>
                                            <p>{{ $domisili->nama_usaha }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Bidang Usaha</small>
                                            <p>{{ $domisili->bidang_usaha }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Mulai Usaha</small>
                                            <p>Tahun {{ \Carbon\Carbon::parse($domisili->mulai_usaha)->format('Y') }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat Domisili</small>
                                            <p>{{ $domisili->alamat_domisili }}</p>
                                        </div>
                                        @else
                                            <div class="mb-1">
                                                <small>Nama Tempat/Usaha</small>
                                                <p>{{ $domisili->nama_usaha }}</p>
                                            </div>
                                            <div class="mb-1">
                                                <small>Alamat Domisili</small>
                                                <p>{{ $domisili->alamat_domisili }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('domisili.export_pdf', $domisili->id) }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-print"></i> Cetak Surat</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
