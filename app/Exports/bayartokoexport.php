<?php

namespace App\Exports;

use App\Models\bayartoko;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Mirrors the table on /logbayartoko (BayartokoController@index, bayartoko/bayartoko.blade.php).
 */
class bayartokoexport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    public function collection()
    {
        $query = bayartoko::with(['kecamatan', 'customer', 'customertoko']);

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_bayar', auth()->user()->id_kecamatan_user);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Kecamatan',
            'Pengirim',
            'Toko',
            'Tanggal',
            'Nominal',
        ];
    }

    public function map($data): array
    {
        return [
            $data->id_bayar,
            $data->kecamatan?->nama_kecamatan,
            $data->customer?->nama,
            $data->customertoko?->nama,
            $data->tanggal_bayar,
            $data->nominal_bayar,
        ];
    }
}
