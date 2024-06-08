<?php

namespace App\Exports;
<<<<<<< HEAD
use App\Models\transaksijs;

=======

use App\Models\transaksijs;
>>>>>>> 0943348 (initial commit)
use Maatwebsite\Excel\Concerns\FromCollection;

class transaksijsexport implements FromCollection
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
        return transaksijs::all();
    }
}
