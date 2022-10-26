@extends('layouts.admin')
@section('title', 'Pembayaran')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="content col-lg-6 col-md-6">

                <h6>Nama Murid</h6>
                <h6><b>{{ $data->nama_murid }}</b></h6>

                <hr>
                <br>

                <h6>Nomor Rekening</h6>
                <p>{{ $data->no_rek }}</p>

                <hr>
                <br>

                <h6>Nomor Handphone</h6>
                <p>{{ $data->no_hp }}</p>

                <hr>
                <br>
                <h6>Jumlah</h6>
                <p>{{ $data->jumlah }}</p>

                <hr>
                <br>
                <h6>Jenis Pembayaram</h6>
                <p>{{ $data->jenis_pembayaran }}</p>

                <hr>
                <br>

                <h6>Tanggal Pembayaran</h6>
                <h6><b>{{ date('d-m-Y H:i:s', strtotime($data->created_at)) }}</b></h6>

            </div>
            <div class="gambar col-lg-6 col-md-6">
                <h6>Bukti Pembayaran</h6>
                <img src="{{ asset('storage') . '/pembayaran/' . base64_decode($data->gambar) }}" alt=""
                    class="img-thumbnail img-responsive mt-2">
            </div>
        </div>
    </div>
@endsection
