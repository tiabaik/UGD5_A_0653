@extends('dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Golongan</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('pegawai')}}">Golongan</a>
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
                                            <th class="text-center">Pegawai Id</th>
                                            <th class="text-center">Golongan</th>
                                            <th class="text-center">Gaji Pokok</th>
                                            <th class="text-center">Tunjangan Keluarga</th>
                                            <th class="text-center">Tunjangan Transport</th>
                                            <th class="text-center">Tunjangan Makan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($golongan as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->golongan->nomor_induk_pegawai }}</td>
                                            <td class="text-center">{{ $item->nomor_golongan }}</td>
                                            <td class="text-center">Rp {{ number_format($item->gaji_pokok, 0, ",", ".") }}</td>
                                            <td class="text-center">Rp{{number_format( $item->tunjangan_keluarga, 0, ",", ".") }}</td>
                                            <td class="text-center">Rp{{number_format($item->tunjangan_transport, 0, ",", "." ) }}</td>
                                            <td class="text-center">Rp{{number_format($item->tunjangan_makan, 0, ",", "." )}}</td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Golongan belum tersedia
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center">{!! $golongan -> links()!!}</div>

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