@extends('layouts.admin.master')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-md-8">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <p>Halaman untuk mengolah data Admin</p>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Admin</a>
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

<!-- DataTales Admin -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th width="15px">No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $admin->nip ? $admin->nip : '-' }}</td>
                            <td>{{ $admin->penduduk->nama }}</td>
                            <td class="text-center">{{ $admin->jabatan_perangkat_desa ? $admin->jabatan_perangkat_desa : '-' }}</td>
                            <td class="text-center" width="300px">
                                <div class="btn btn-toolbar justify-content-center">
                                    <button type="button" class="btn btn-secondary btn-sm mr-2" data-toggle="modal" data-target="#exampleModal-{{ $admin->id }}">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pen"></i> Edit</a>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm " {{ $admin->id == auth()->user()->id ? 'disabled' : $admin->role == 'super_admin' ? 'disabled' : '' }}><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal-{{ $admin->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal-{{ $admin->id }}Label">{{ $admin->penduduk->nama }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('template/img/user.png') }}" alt="" width="100%">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-1">
                                            <small>NIK</small>
                                            <p>{{ $admin->nik }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>NIP</small>
                                            <p>{{ $admin->nip ? $admin->nip : '-' }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Nama</small>
                                            <p>{{ $admin->penduduk->nama }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Jenis Kelamin</small>
                                            <p>{{ $admin->penduduk->jenis_kelamin }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Tempat Tanggal Lahir</small>
                                            <p>{{ $admin->penduduk->tempat_lahir }}, {{ \Carbon\Carbon::parse($admin->penduduk->tanggal_lahir)->format('d M Y') }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Status Perkawinan</small>
                                            <p>{{ $admin->penduduk->status_perkawinan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Pendidikan</small>
                                            <p>{{ $admin->penduduk->pendidikan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Alamat</small>
                                            <p>{{ $admin->penduduk->alamat }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Agama</small>
                                            <p>{{ $admin->penduduk->agama ? $admin->penduduk->agama : '-' }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Pekerjaan</small>
                                            <p>{{ $admin->penduduk->pekerjaan }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Role</small>
                                            <p>{{ Str::title(str_replace('_',' ',$admin->role))  }}</p>
                                        </div>
                                        <div class="mb-1">
                                            <small>Posisi</small>
                                            <p>{{ $admin->jabatan_perangkat_desa ? $admin->jabatan_perangkat_desa : '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
