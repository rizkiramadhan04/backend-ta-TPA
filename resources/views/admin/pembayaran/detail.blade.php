@extends('layouts.admin')
@section('title', 'Pembayaran')
@section('content')
    <div class="container">
        <div class="row">
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

                <h6>Tanggal Agenda</h6>
                <h6><b>{{ $data->tanggal_agenda }}</b></h6>

            </div>
            <div class="gambar col-lg-6 col-md-6">
                <h6>Gambar</h6>
                <img src="{{ asset('storage') . '/agenda/' . base64_decode($data->gambar) }}" alt=""
                    class="img-thumbnail img-responsive">
            </div>
        </div>
    </div>
@endsection
