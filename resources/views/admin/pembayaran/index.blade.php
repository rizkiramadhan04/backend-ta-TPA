@extends('layouts.admin')
@section('title', 'Pembayaran')
@section('content')
    <div class="text-center">

         @if(Session::has('error'))
		    @if ($message = Session::get('error'))
		    <div class="alert alert-danger alert-block" style="width: 100%;display: block;">
		    <button type="button" class="close" data-dismiss="alert">×</button> 
			    <strong>{{ $message }}</strong>
		    </div>
		    @endif
	    @endif
        @if(Session::has('success'))
		    @if ($message = Session::get('success'))
		    <div class="alert alert-success alert-block" style="width: 100%;display: block;">
		    <button type="button" class="close" data-dismiss="alert">×</button> 
			    <strong>{{ $message }}</strong>
		    </div>
		    @endif
	    @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
            <a href="{{ route('admin.pembayaran-create-page') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fa-solid fa-plus"></i> Buat Pembayaran
            </a>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Murid</th>
                            <th>No Rekening</th>
                            <th>Jumlah</th>
                            <th>Status</th>
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
                                <td>{{ $obj->nama_murid }}</td>
                                <td>{{ $obj->no_rek }}</td>
                                <td>{{ $obj->jumlah }}</td>
                                <td>
                                    <?php if ($obj->status == 0) { ?>
                                    <span class="badge badge-primary">Belum dilihat</span>
                                    <?php } else { ?>
                                    <span class="badge badge-success">Diterima</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="{{ route('admin.pembayaran-detail', $obj->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.pembayaran-delete', $obj->id) }}" method="post" class="d-inline">
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
