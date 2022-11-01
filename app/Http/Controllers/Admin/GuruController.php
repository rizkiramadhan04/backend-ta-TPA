<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\PresensiExport;
use App\Exports\MengajarExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportMengajar(Request $request, $id) {
        $nama_user = User::findOrFail($id);
        $param = array('id' => $id, 'tanggal_awal' => $request->tanggal_awal, 'tanggal_akhir' => $request->tanggal_akhir);
        return Excel::download(new MengajarExport($param), 'Mengajar_'.$nama_user->name.'.xlsx');
    }
}
