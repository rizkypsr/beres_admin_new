<?php

namespace App\Exports;

<<<<<<< HEAD
use App\Models\Customer;
use App\Models\kota;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class KecamatanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
=======
use App\Models\kota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KecamatanExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
>>>>>>> 0943348 (initial commit)
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Kota',
            'Kecamatan',
        ];
    }
<<<<<<< HEAD
=======

>>>>>>> 0943348 (initial commit)
    public function collection()
    {
        return kota::with('kecamatan')->get();
    }

    public function map($cust): array
    {
        return [
            $cust->kecamatan->id_kecamatan,
            $cust->nama_kota,
            $cust->kecamatan->nama_kecamatan,
        ];
    }
}
