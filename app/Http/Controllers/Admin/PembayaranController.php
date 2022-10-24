<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function index() {

        $item = Pembayaran::all();
        return view('admin.pembayaran.index', compact('item'));
    }

    public function detail($id) {

        $data = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.detail', compact('data'));
    }

    public function createPage() {
        return view('admin.pembayaran.create');
    }
}
