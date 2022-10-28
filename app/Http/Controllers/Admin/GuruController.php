<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\PresensiExport;

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

    public function createPage() {
        return view('admin.guru.create');
    }

    public function delete($id) {
        
        $guru = User::findOrFail($id);

        if ($guru) {
            $guru->delete();
        }

        return redirect()->route('admin.guru')->with(['success', 'Data guru' .  $guru->name . 'berhasil dihapus']);
    }

    public function exportPresensi() {
        return Excel::download(new PresensiExport(), 'presensi.xlsx');
    }

    public function exportMengajar() {
        return Excel::download(new PresensiExport(), 'mengajar.xlsx');
    }
}
