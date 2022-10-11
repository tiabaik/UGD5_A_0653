@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pegawai</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Pegawai</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
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
                        <form action="{{ route('pegawai.edit', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Nomor Induk Pegawai</label>
                                    <input type="number" class="form-control @error('nomor_induk_pegawai') is-invalid @enderror" 
                                    name="nomor_induk_pegawai" value="{{ old('nomor_induk_pegawai' , $pegawai->nomor_induk_pegawai) }}" 
                                        placeholder="Masukkan NIP">
                                        @error('nomor_induk_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                                    name="nama_pegawai" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}"
                                    placeholder="Masukkan Nama Pegawai">
                                    @error('nama_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold form-label" for="departemen">Departemen</label>
                                    <select class="form-select @error('departemen') is-invalid @enderror" name="id_departemen" id="departemen">
                                        <option hidden disabled selected value="">Pilih Departemen</option>
                                        @foreach($departemen as $item)
                                            <option value="{{$item->id}}">
                                                {{ $item->nama_departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departemen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div> 
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" 
                                    name="telepon" value="{{ old('telepon' , $pegawai->telepon) }}" 
                                        placeholder="Masukkan No.Telepon">
                                        @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email' , $pegawai->email) }}"
                                    placeholder="Masukkan Email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Tanggal Bergabung</label> 
                                <input type="date" class="form-control @error('tanggal_bergabung') is-invalid @enderror" 
                                name="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}" placeholder="Masukkan tanggtal"> 
                                @error('tanggal_bergabung') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div> 
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold form-label" for="gender">Gender</label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option hidden disabled selected value="">Pilih Gender</option>
                                        <option value="1">Laki-laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold form-label" for="status">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option hidden disabled selected value="">Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </form>
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