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
                        <form action="/pegawai/{{$pegawai->id}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-row"> 
                            <div class="form-group col-md-4"> 
                                <label class="font-weight-bold">NIP</label> 
                                <input type="text" 
                                class="form-control @error('nomor_induk_pegawai') is-invalid @enderror" 
                                name="nomor_induk_pegawai" 
                                value="{{ $pegawai->nomor_induk_pegawai }}" 
                                placeholder="Masukkan NIP"> 
                                @error('nomor_induk_pegawai') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div> 
                            <div class="form-group col-md-4"> 
                                <label class="font-weight-bold">Nama Pegawai</label> 
                                <input type="text" 
                                class="form-control @error('nama_pegawai') is-invalid @enderror" 
                                name="nama_pegawai" 
                                value="{{ $pegawai->nama_pegawai }}" 
                                placeholder="Masukkan Nama Pegawai"> 
                                @error('nama_pegawai') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div>

                            <div class="form-group col-md-4"> 
                                <label class="font-weight-bold">Departemen</label> 
                                <select class="form-control @error('id_departemen') is-invalid @enderror" name="id_departemen">
                                @foreach($departemen as $item)
                                <option value="{{ $pegawai->id_departemen }}" selected hidden>{{ $pegawai->depart->nama_departemen }}</option>
                                    <option value="{{ $item->id }}" {{ old('id_departemen') == $item->id ? 'selected' : null }}>{{ $item->nama_departemen }}</option>
                                @endforeach
                                </select>
                                @error('id_departemen') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div>
                        </div> 

                        <div class="form-row"> 
                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Telepon</label> 
                                <input type="text" 
                                class="form-control @error('telepon') is-invalid @enderror" 
                                name="telepon" 
                                value="{{ $pegawai->telepon }}" placeholder="Masukkan No. Telepon"> 
                                @error('telepon') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror
                            </div> 

                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Email</label> 
                                <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ $pegawai->email }}" placeholder="Masukkan Email"> 
                                @error('email') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div> 
                        </div> 

                        <div class="form-row"> 
                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Gender</label> 
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                @if ($pegawai->gender  === 1)
                                    <option value="1" selected hidden>Pria</option>
                                @else
                                    <option value="2" selected hidden>Wanita</option>
                                @endif
                                    <option value="1">Pria</option>
                                    <option value="2">Wanita</option>
                                </select>
                                @error('gender') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror
                            </div> 

                            <div class="form-group col-md-6"> 
                            <label class="font-weight-bold">Status</label> 
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                @if ($pegawai->status  === 1)
                                    <option value="1" selected hidden>Aktif</option>
                                @else
                                    <option value="2" selected hidden>Tidak Aktif</option>
                                @endif
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
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
