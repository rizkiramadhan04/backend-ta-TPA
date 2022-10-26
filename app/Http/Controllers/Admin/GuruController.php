<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class GuruController extends Controller
{
    public function index() {

        $item = User::where('status', 1)->get();

        return view('admin.guru.index', compact('item'));
    }

    public function detail($id) {
        $data = User::where('id', $id)->first();
        return view('admin.guru.detail', compact('data'));
    }
}
