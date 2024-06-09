<?php

namespace App\Exports;

use App\Models\topup;
use Maatwebsite\Excel\Concerns\FromCollection;

class topupexport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return topup::all();
    }
}
