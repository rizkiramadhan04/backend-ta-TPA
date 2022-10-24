<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index() {

        $item = Murid::all();

        return view('admin.murid.index', compact('item'));
    }

    public function detail($id) {
        $data = Murid::findOrFail($id);

        return view('admin.murid.detail', compact('data'));
    }
}
