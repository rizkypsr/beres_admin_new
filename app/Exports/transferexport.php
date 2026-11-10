<?php

namespace App\Exports;

use App\Models\Transfer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Mirrors the table on /logtransfer (TransferController@index, transfer/transfer.blade.php).
 */
class transferexport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    private int $no = 0;

    public function collection()
    {
        $query = Transfer::with(['kecamatan', 'customer', 'customerpenerima']);

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_transfer', auth()->user()->id_kecamatan_user);
        }

        return $query->get();
    }

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
