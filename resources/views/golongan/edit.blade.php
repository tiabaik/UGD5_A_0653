@extends('dashboard') 

@section('content') 
<div class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <div class="col-sm-6"> 
                <h1 class="m-0">Tambah Golongan</h1> 
            </div> 
            <!-- /.col --> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="#"></a> Golongan
                    </li> 
                    <li class="breadcrumb-item active">Create</li> 
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
                        <form action="{{ route('golongan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group col-md-4"> 
                                <label class="font-weight-bold">Pegawai</label> 
                                <select class="form-control @error('pegawai_id') is-invalid @enderror" name="pegawai_id">
                                <option value="" selected hidden>Pilih Pegawai </option>
                                @foreach($pegawai as $item)
                                    <option value="{{ $item->id }}" > {{$item->nama_pegawai}} </option>
                                @endforeach
                                </select>
                                @error('pegawai_id') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div>
                           
                            <div class="form-row"> 
                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Nama Golongan</label> 
                                <input type="text" 
                                class="form-control @error('nomor_golongan') is-invalid @enderror" 
                                name="nomor_golongan" 
                                value="{{ old('nomor_golongan') }}" placeholder="Masukkan Nama Golongan"> 
                                @error('nomor_golongan') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror
                            </div> 

                        <div class="form-row"> 
                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Gaji Pokok</label> 
                                <input type="number" 
                                class="form-control @error('gaji_pokok') is-invalid @enderror" 
                                name="gaji_pokok" 
                                value="{{ old('gaji_pokok',  $golongan->gaji_pokok) }}" placeholder="Masukkan gaji pokok"> 
                                @error('gaji_Pokok') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror
                            </div> 

                            <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Tunjangan Keluarag</label> 
                                <input type="number" class="form-control @error('tunjangan_keluarga') is-invalid @enderror" 
                                name="tunjangan_keluarga" value="{{ old('tunjangan_keluarga',  $golongan->tunjangan_keluarga) }}" placeholder="Masukan Tujuangan Keluarga"> 
                                @error('tunjangan_keluarga') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div> 
                        </div> 

                        <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Tunjangan Transport</label> 
                                <input type="number" class="form-control @error('tunjangan_transport') is-invalid @enderror" 
                                name="tunjangan_transport" value="{{ old('tunjangan_transport', $golongan->tunjangan_transport ) }}" placeholder="Masukkan Transport"> 
                                @error('tunjangan_transport') 
                                <div class="invalid-feedback"> 
                                    {{ $message }} 
                                </div> 
                                @enderror 
                            </div> 
                        </div> 

                        <div class="form-group col-md-6"> 
                                <label class="font-weight-bold">Tunjangan Makan</label> 
                                <input type="number" class="form-control @error('tunjangan_makan') is-invalid @enderror" 
                                name="tunjangan_makan" value="{{ old('tunjangan_makan', $golongan->tunjangan_makan) }}" placeholder="Masukkan Makan"> 
                                @error('tunjangan_makan') 
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
