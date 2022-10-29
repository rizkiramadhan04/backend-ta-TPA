<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PencatatanController extends Controller
{
    public function getData() {

        if (auth()->guard('api')->check()) {

            $user_id = auth()->guard('api')->user()->id;
            $data[] = Pencatatan::where('murid_id', $user_id)->orderBy('created_at', 'asc')->limit(30)->get();

            if ($data > 0) {
                $response = [
                    'status' => 'success',
                    'data'   => $data,
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'Data tidak ada!',
                ];
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Mohon untuk login terlebih dahulu!'
            ];
        }

        return response()->json($response, 200);
    }

    public function getDataGuru(Request $request) {

        if (auth()->guard('api')->check()) {

            $data[] = Pencatatan::where('murid_id', $request->murid_id)->orderBy('created_at', 'asc')->limit(30)->get();

            if ($data > 0) {
                $response = [
                    'status' => 'success',
                    'data'   => $data,
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'Data tidak ada!',
                ];
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Mohon untuk login terlebih dahulu!'
            ];
        }

        return response()->json($response, 200);
    }

    public function inputPencatatan() {

        if (auth()->guard('api')->check()) {
            
            $validator = Validator::make($request->all(), [
                'murid_id'    => 'required',
                'jilid'       => 'required',
                'halaman'     => 'required',
                'hasil'       => 'required',
                'tanggal'     => 'required',
                'jenis_kitab' => 'required',
            ], [
                'murid_id.required'     => 'Nama murid belum diisi!',
                'jilid.required'        => 'Jilid belum diisi!',
                'halaman.required'      => 'Halaman belum diisi!',
                'hasil.required'        => 'Hasil belum diisi!',
                'tanggal.required'      => 'Tanggal belum diisi!',
                'jenis_kitab.required'  => 'Jenis kitab belum diisi!',
            ]);
    
            if ($validator->fail()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors(),
                ]);
            }
            
            DB::beginTransaction();
            try {
                
                $guru_id = auth()->guard('api')->user()->id;
    
                $hafalan = new Hafalan;
                $hafalan->murid_id    = $request->murid_id;
                $hafalan->no_surah    = $request->no_surah;
                $hafalan->no_ayat     = $request->no_ayat;
                $hafalan->no_iqro     = $request->no_iqro;
                $hafalan->jilid       = $request->jilid;
                $hafalan->halaman     = $request->halaman;
                $hafalan->guru_id     = $guru_id;
                $hafalan->hasil       = $request->hasil;
                $hafalan->tanggal     = $request->tanggal;
                $hafalan->jenis_kitab = $request->jenis_kitab;

                $hafalan->save();
                DB::commit();

                if ($hafalan->save()) {
                    $response = [
                        'status'  => 'success',
                        'message' => 'Data berhasil disimpan!',
                        $data     => $hafalan,
                    ];
                }

            } catch (Exception $e) {

                DB::rollback();
                $response = [
                    'status'  => 'failed',
                    'message' => $e->getMessage(),
                ];

            }
            
        } else {
            $response = [
                'status'  => 'failed',
                'message' => 'Mohon untuk login terlebih dahulu!'
            ];
        }
    }
}
