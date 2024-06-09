<?php

namespace App\Exports;

use App\Models\transaksippob;
use Maatwebsite\Excel\Concerns\FromCollection;

class ppobexport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return transaksippob::all();
    }
}
