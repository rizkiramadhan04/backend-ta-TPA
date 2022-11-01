@extends('layouts.admin')
@section('title', 'Data Detail Guru')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Guru</h1>
        </div>
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

        </div>
        <div class="row mt-5 mb-5">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Presensi</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Menu : </div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#presensi">Export Excel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Mengajar</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Menu : </div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mengajar">Export Excel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Awal
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Menengah
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Lancar
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="mengajar" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Export Data Mengajar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6><b>Data {{ $data->name }}</b></h6>
                        <form action="{{ route('admin.export-mengajar', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tanggal_awal">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tanggal_akhir">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Export Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="presensi" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Export Data Presensi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6><b>Data {{ $data->name }}</b></h6>
                        <form action="{{ route('admin.export-presensi', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tanggal_awal">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tanggal_akhir">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Export Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
