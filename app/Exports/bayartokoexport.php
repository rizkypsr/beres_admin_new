<?php

namespace App\Exports;

use App\Models\bayartoko;

/**
 * Mirrors the table on /logbayartoko (BayartokoController@index, bayartoko/bayartoko.blade.php).
 */
class bayartokoexport implements StreamableExport
{
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

    public function rows(): iterable
    {
        $query = bayartoko::with(['kecamatan', 'customer', 'customertoko']);

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_bayar', auth()->user()->id_kecamatan_user);
        }

        foreach ($query->lazy(1000) as $data) {
            yield $this->map($data);
        }
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
