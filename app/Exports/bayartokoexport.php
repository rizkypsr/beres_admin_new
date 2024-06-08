<?php

namespace App\Exports;
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
use App\Models\bayartoko;
use Maatwebsite\Excel\Concerns\FromCollection;

class bayartokoexport implements FromCollection
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
        return bayartoko::all();
    }
}
