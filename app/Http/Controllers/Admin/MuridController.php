<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\HafalanExport;
use App\Exports\PresensiExport;
use App\Exports\PencatatanExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

     public function exportPresensi() {
        return Excel::download(new PresensiExport(), 'presensi.xlsx');
    }

    public function exportPencatatan(Request $request, $id) {
        
        $nama_user = User::findOrFail($id);
        $param = array('id' => $id, 'tanggal_awal' => $request->tanggal_awal, 'tanggal_akhir' => $request->tanggal_akhir);
        return Excel::download(new PencatatanExport($param), 'Mengaji_'.$nama_user->name.'.xlsx');
    }

    public function exportHafalan(Request $request, $id) {

        $nama_user = User::findOrFail($id);
        $param = array('id' => $id, 'tanggal_awal' => $request->tanggal_awal, 'tanggal_akhir' => $request->tanggal_akhir);
        return Excel::download(new HafalanExport($param), 'Hafalan_'.$nama_user->name.'.xlsx');
    }
}
