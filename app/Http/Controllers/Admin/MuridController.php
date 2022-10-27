<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MuridController extends Controller
{
    public function index() {

        $item = User::where('status', 0)->get();

        return view('admin.murid.index', compact('item'));
    }

    public function detail($id) {
        $data = User::findOrFail($id);

        return view('admin.murid.detail', compact('data'));
    }

    public function createPage() {
        return view('admin.murid.create');
    }

    public function delete($id) {

        $murid = User::findOrFail($id);

        if ($murid) {
            $murid->delete();
        }

        return redirect()->route('admin.murid')->with(['success', 'Data murid' .  $murid->name . 'berhasil dihapus']);
    }
}
