@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('content')
    <div class="container-fluid">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-xl-6 col-md-4">
                <label for="">Nama Agenda</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="name_agenda"
                    aria-describedby="nama_agenda" name="nama_agenda" value="">
                @error('nama_agenda')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="deskripsi_agenda">Deskripsi Agenda</label>
                <input type="text" class="form-control @error('deskripsi_agenda') is-invalid @enderror"
                    id="deskripsi_agenda" name="deskripsi_agenda" value="">
                @error('deskripsi_agenda')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="tanggal_agenda">Tanggal Agenda</label>
                <input type="date" class="form-control @error('tanggal_agenda') is-invalid @enderror" id="tanggal_agenda"
                    name="tanggal_agenda" value="">
                @error('tanggal_agenda')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="gambar">Gambar Agenda</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                    name="gambar" value="">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary"> Simpan </button>
        </form>

    </div>
@endsection
