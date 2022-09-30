@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pegawai</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('pegawai')}}">Pegawai</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table table-hover textnowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor Induk Pegawai</th>
                                            <th class="text-center">Nama Pegawai</th>
                                            <th class="text-center">Id Departemen</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Telepon</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Tanggal Bergabung</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pegawai as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->nomor_induk_pegawai }}</td>
                                            <td class="text-center">{{ $item->nama_pegawai }}</td>
                                            <td class="text-center">{{ $item->pegawai->nama_departemen }}</td>
                                            <td class="text-center">{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->telepon }}</td>
                                            <td class="text-center">{{ $item->gender==1? "laki-laki":"perempuan" }}</td>
                                            <td class="text-center">{{ date('d F Y', strtotime($item->tanggal_bergabung ) ) }}</td>
                                            <td class="text-center">{{ $item->status==1? "aktif":"tidak aktif" }}</td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Pegawai belum tersedia
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center">{!! $pegawai -> links()!!}</div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection