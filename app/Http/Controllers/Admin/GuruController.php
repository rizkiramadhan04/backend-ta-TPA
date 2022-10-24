<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index() {

        $item = Guru::all();

        return view('admin.guru.index', compact('item'));
    }

    public function detail($id) {
        $data = Guru::findOrFail($id);
        return view('admin.guru.detail', compact('data'));
    }
}
