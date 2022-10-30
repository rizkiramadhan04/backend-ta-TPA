<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function getData() {

        if (auth()->guard('api')->check()) {
    
            $user_id = auth()->guard('api')->user()->id;
            $data = Pembayaran::where('user_id', $user_id)->orderBy('created_at', 'asc')->limit(30)->get();
    
            if (count($data) > 0) {
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

    public function inputPembayaran(Request $request) {

        // dd($request->all());

        if (auth()->guard('api')->check()) {

            $validator = Validator::make($request->all(), [
                ''        => 'required',
                ''  => 'required',
                '' => 'required',
                ''           => 'required',
            ], [
                '.required'        => 'Nama murid belum diisi!',
                '.required'  => ' belum diisi!',
                '.required' => ' belum diisi!',
                '.required'           => ' belum diisi!',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors(),
                ]);
            }
            
            DB::beginTransaction();
            try {
    
                $pembayaran = new Pembayaran;
                $pembayaran->murid_id         = $request->md;
                $pembayaran->materi_pemb   = $request->materi_pemb;
                $pembayaran->tanggal_pemb  = $request->tanggal_pemb;
                $pembayaran-            = $request-;
                $pembayaran->          = $guru_id;
        
                $pembayaran->save();

                DB::commit();
                $response = [
                    'status'   => 'success',
                    'message' => 'Berhasil ditambahkan!',
                    'data'    => $hafalan,
                ];

            } catch (Exception $e) {
                DB::rollback();
                $response = [
                    'satus'   => 'failed',
                    'message' => $e->getMessage(),
                ];
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Mohon untuk login terlebih dahulu!',
            ];
        }

        return response()->json($response, 200);
        
    }
}
