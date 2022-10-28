<?php

namespace App\Exports;

use App\Models\Pencatatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PencatatanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): View
    {
        $pencatatan = Pencatatan::select('pencatatans.*', 'users.name as nama')->join('users', 'users.id', '=', 'pencatatans.murid_id')->get();
        return view('admin.exports.penjualan_export', [
            'model' => $pencatatan,
        ]);
    }
}
