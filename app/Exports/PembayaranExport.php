<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PembayaranExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): View
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'users.name as nama')->join('users', 'users.id', '=', 'pembayarans.user_id')->get();
        return view('admin.exports.penjualan_export', [
            'model' => $pembayaran,
        ]);
    }
}
