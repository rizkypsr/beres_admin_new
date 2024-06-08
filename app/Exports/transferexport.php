<?php

namespace App\Exports;
<<<<<<< HEAD
use App\Models\transfer;

=======

use App\Models\transfer;
>>>>>>> 0943348 (initial commit)
use Maatwebsite\Excel\Concerns\FromCollection;

class transferexport implements FromCollection
{
    /**
<<<<<<< HEAD
    * @return \Illuminate\Support\Collection
    */
=======
     * @return \Illuminate\Support\Collection
     */
>>>>>>> 0943348 (initial commit)
    public function collection()
    {
        return transfer::all();
    }
}
