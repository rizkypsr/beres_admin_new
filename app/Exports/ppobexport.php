<?php

namespace App\Exports;

<<<<<<< HEAD
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\transaksippob;
class ppobexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
=======
use App\Models\transaksippob;
use Maatwebsite\Excel\Concerns\FromCollection;

class ppobexport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
>>>>>>> 0943348 (initial commit)
    public function collection()
    {
        return transaksippob::all();
    }
}
