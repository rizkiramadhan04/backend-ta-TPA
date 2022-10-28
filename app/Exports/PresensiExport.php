<?php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PresensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): View
    {
        $presensi = Presensi::select('presensis.*', 'users.name as nama')->join('users', 'users.id', '=', 'presensis.user_id')->get();
        return view('admin.exports.penjualan_export', [
            'model' => $presensi,
        ]);
    }
}
