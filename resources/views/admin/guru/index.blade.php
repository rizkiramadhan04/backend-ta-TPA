@extends('layouts.admin')
@section('title', 'Data Guru')
@section('content')
    <div class="text-center">
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Produk</h1>
            <a href="{{ route('admin.produk.export') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-download"></i> Export Excel
            </a>
        </div> --}}
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Tingkatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($item as $obj)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->email }}</td>
                                <td>{{ date('d-m-Y', strtotime($obj->tgl_lahir)) }}</td>
                                <td>{{ $obj->tingkatan }}</td>
                                <td>
                                    <a href="{{ route('admin.guru-detail', $obj->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form action="#" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @empty
                            <tr>
                                <td colspan="8">Data Masih Kosong !!</td>
                            </tr>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
