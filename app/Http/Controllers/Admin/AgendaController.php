<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    public function index() {

        $item = Agenda::all();
        return view('admin.agenda.index', compact('item'));

    }

    public function detail($id) {

        $data = Agenda::findOrFail($id);
        return view('admin.agenda.detail', compact($data));
    }

    public function createPage() {

        return view('admin.agenda.create');
    }

    public function create(Request $request) {

        $validator = Validator::make($request->all(), [
            'nama_agenda'       => 'required',
            'deskripsi_agenda'  => 'required',
            'tanggal_agenda'    => 'required',
            'gambar'            => 'required|mimes:jpg,JPG,jpeg,JPEG,png,PNG|max:10024',
        ], [
            'nama_agenda.required'      => 'Nama agenda belum diisi!',
            'deskripsi_agenda.required' => 'Deskripsi agenda belum diisi!',
            'tanggal_agenda.required'   => 'Tanggal agenda belum diisi!',
            'gambar.required'           => 'Gambar belum diisi!',
            'gambar.mimes'              => 'File gambar yang anda upload salah!',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.agenda-create-page')->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {

            if ($request->has('file_receipt')) {
                $filename = str_replace('.', '', microtime(date('Y-m-d H:i:s'))) . $request->nama_agenda . '.' . $request->gambar->extension();
                $request->file_receipt->move(public_path('/storage/receipt/'), $filename);
              }
              else {
                  DB::rollback();
      
                  $response = [
                      'error' => 'File yang anda upload salah'
                  ];
      
                  return redirect()->route('admin.agenda-create-page')->with($response);
                }
            
            $agenda                      = new Agenda;
            $agenda->nama_agenda         = $request->nama_agenda;
            $agenda->deskripsi_agenda    = $request->deskripsi_agenda;
            $agenda->tanggal_agenda      = $request->tanggal_agenda;
            $agenda->gambar              = $request->$filename;

            $agenda->save();

            DB::commit();
            return redirect()->route('admin.agenda');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.agenda')->withErrors($e->getMessage());
        }
    }

    public function updatePage($id) {

        $data = Agenda::findOrFail($id);
        return view('admin.agenda.update', compact($data));

    }

}
