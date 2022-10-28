<?php

namespace App\Exports;

use App\Models\Hafalan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HafalanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): View
    {
        $hafalan = Hafalan::select('hafalans.*', 'users.name as nama')->join('users', 'users.id', '=', 'hafalans.murid_id')->get();
        return view('admin.exports.penjualan_export', [
            'model' => $hafalan,
        ]);
    }
}
