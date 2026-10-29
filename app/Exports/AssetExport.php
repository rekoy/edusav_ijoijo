<?php

namespace App\Exports;

use App\Models\AssetModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(Request $request)
    {
        error_log(' Request : '.json_encode($request));

        return AssetModel::all();
    }
}
