<?php

namespace App\Exports;

use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KecamatanExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id Kecamatan',
            'Kota',
            'Kecamatan',
        ];
    }

    public function collection()
    {
        return Kecamatan::where('status_kecamatan', 0)->with('kota')->orderBy('id_kota_kecamatan')->get();
    }

    public function map($data): array
    {
        return [
            $data->id_kecamatan,
            $data->kota->nama_kota,
            $data->nama_kecamatan,
        ];
    }
}
