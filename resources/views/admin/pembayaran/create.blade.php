@extends('layouts.admin')
@section('title', 'Pembayaran')
@section('content')
    <div class="container-fluid">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-xl-6 col-md-4">
                <label for="nama_murid">Nama Murid</label>
                <input type="text" class="form-control @error('murid_id') is-invalid @enderror" id="murid_id"
                    name="murid_id" value="">
                @error('murid_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="jenis_pembayaran">Jenis Pembayaran</label>
                <select class="form-control @error('jenis_pembayaran') is-invalid @enderror" id="jenis_pembayaran"
                    name="jenis_pembayaran">
                    <option value="Bayaran Bulanan">Bayaran Bulanan</option>
                    <option value="Sumbangan Untuk Agenda">Sumbangan Untuk Agenda</option>
                </select>
                @error('jenis_pembayaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="jumlah">Jumlah <span style="color: red;">*</span>Rp. </label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                    name="jumlah">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-xl-6 col-md-4">
                <label for="gambar">Bukti Pembayaran</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                    name="gambar">
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
