@extends('layouts.admin')
@section('title', 'Data Agenda')
@section('content')
    <div class="container">
        <div class="row">
            <div class="content col-lg-6 col-md-6">
                    
                <h6>Nama Guru</h6>
                <h6><b>{{ $data->name }}</b></h6>

                <hr>
                <br>

                <h6>Email</h6>
                <p>{{ $data->email }}</p>

                <hr>
                <br>

                <h6>Tanggal Lahir</h6>
                <h6><b>{{ $data->tgl_lahir }}</b></h6>

                <hr>
                <br>

                <h6>Alamat</h6>
                <h6><b>{{ $data->alamat }}</b></h6>

                <hr>
                <br>

                <h6>Tingkatan</h6>
                <h6><b>{{ $data->tingkatan }}</b></h6>
                
            </div>
            <div class="gambar col-lg-6 col-md-6">
                <h6>Gambar</h6>
                
            </div>
        </div>
    </div>
@endsection
