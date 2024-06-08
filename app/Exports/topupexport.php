<?php

namespace App\Exports;

<<<<<<< HEAD
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\topup;
=======
use App\Models\topup;
use Maatwebsite\Excel\Concerns\FromCollection;
>>>>>>> 0943348 (initial commit)

class topupexport implements FromCollection
{
    /**
<<<<<<< HEAD
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
     return topup::all();
=======
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return topup::all();
>>>>>>> 0943348 (initial commit)
    }
}
