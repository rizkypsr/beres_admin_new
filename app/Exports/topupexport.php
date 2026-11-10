<?php

namespace App\Exports;

use App\Models\topup;

/**
 * Mirrors the table on /logtopup (TopupController@index, transaksitopup/topup.blade.php).
 */
class topupexport implements StreamableExport
{
    private int $no = 0;

    public function headings(): array
    {
        return [
            'Id',
            'Nama Customer',
            'Kecamatan',
            'Tanggal topup',
            'Nominal',
            'Total Saldo',
        ];
    }

    public function rows(): iterable
    {
        $query = topup::with('kecamatan');

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_topup', auth()->user()->id_kecamatan_user);
        }

        foreach ($query->lazy(1000) as $data) {
            yield $this->map($data);
        }
    }

    public function map($data): array
    {
        return [
            ++$this->no,
            $data->nama_customer_topup,
            $data->kecamatan?->nama_kecamatan,
            $data->tanggal_topup,
            $data->nominal_topup,
            $data->total_saldo_topup,
        ];
    }
}
