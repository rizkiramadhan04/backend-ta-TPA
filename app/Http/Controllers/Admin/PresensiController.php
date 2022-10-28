<?php

namespace App\Http\Controllers\Admin;

use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\JadwalPresensi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Exports\PresensiExport;

class PresensiController extends Controller
{
    public function index() {

        $item = JadwalPresensi::all();

        return view('admin.jadwal_presensi.index', compact('item'));
    }

    public function createPage() {
        return view('admin.jadwal_presensi.create');
    }

    public function create(Request $request) {
        
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'nama_kegiatan'  => 'required',
            'tanggal_awal'   => 'required',
            'tanggal_akhir'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.presensi-create-page')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            
            $permitted_chars        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $kode_presensi          = "MAM_" . substr(str_shuffle($permitted_chars), 0, 16) . "_" . date('d_m_Y', strtotime($request->tanggal_awal));
            
            $data                   = new JadwalPresensi;
            $data->nama_kegiatan    = $request->nama_kegiatan;
            $data->tanggal_awal     = date('Y-m-d H:i', strtotime($request->tanggal_awal));
            $data->tanggal_akhir    = date('Y-m-d H:i', strtotime($request->tanggal_akhir));
            $data->kode_presensi    = base64_encode($kode_presensi);

            $data->save();

            DB::commit();
            return redirect()->route('admin.presensi')->with(['success', 'Data jadwal presensi berhasil ditambah']);

        } catch (Exception $e) {
            
            DB::rollback();
            return redirect()->route('admin.presensi')->withErrors($e->getMessage())->withInput();

        }
    }

    public function detail($id) {
        $data = JadwalPresensi::findOrFail($id);
        return view('admin.jadwal_presensi.update', compact('data'));
    }

    public function delete($id) {

        $data = JadwalPresensi::findOrFail($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.presensi')->with(['success', 'Data presensi berhasil dihapus']);
    }

    public function dataPresensi() {
        $item = Presensi::select('presensis.*', 'users.name as name', 'users.tingkatan as tingkatan')->join('users', 'presensis.user_id', '=', 'users.id')->get();
        
        return view('admin.presensi.index', compact('item'));
    }

     public function export() {
        return Excel::download(new PresensiExport(), 'presensi.xlsx');
    }
}
