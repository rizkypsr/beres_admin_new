<?php

namespace App\Exports;

use App\Models\Transfer;

/**
 * Mirrors the table on /logtransfer (TransferController@index, transfer/transfer.blade.php).
 */
class transferexport implements StreamableExport
{
    private int $no = 0;

    public function headings(): array
    {
        return [
            'Id',
            'Kecamatan',
            'Pengirim',
            'Penerima',
            'Tanggal',
            'Nominal',
        ];
    }

    public function rows(): iterable
    {
        $query = Transfer::with(['kecamatan', 'customer', 'customerpenerima']);

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_transfer', auth()->user()->id_kecamatan_user);
        }

        foreach ($query->lazy(1000) as $data) {
            yield $this->map($data);
        }
    }

    public function map($data): array
    {
        return [
            ++$this->no,
            $data->kecamatan?->nama_kecamatan,
            $data->customer?->nama,
            $data->customerpenerima?->nama,
            $data->tanggal,
            $data->nominal,
        ];
    }
}
