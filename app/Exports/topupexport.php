<?php

namespace App\Exports;

use App\Models\topup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Mirrors the table on /logtopup (TopupController@index, transaksitopup/topup.blade.php).
 */
class topupexport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    private int $no = 0;

    public function collection()
    {
        $query = topup::with('kecamatan');

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_topup', auth()->user()->id_kecamatan_user);
        }

        return $query->get();
    }

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
