<?php

namespace App\Exports;

use App\Models\transaksippob;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Mirrors the table on /logppob (TransaksippobController@ppob, transaksippob/logtransaksippob.blade.php).
 */
class ppobexport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    private int $no = 0;

    public function collection()
    {
        return transaksippob::with('customer')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Nama Customer',
            'Produk',
            'Harga',
            'Bayar',
            'Nomor',
            'Tanggal',
            'Status',
        ];
    }

    public function map($data): array
    {
        return [
            ++$this->no,
            $data->customer?->nama,
            $data->produk_transaksi_ppob,
            $data->harga_transaksi_ppob,
            $data->bayar_transaksi_ppob,
            $data->nomor_inputan,
            $data->tanggal_transaksi_ppob,
            $data->status_ppob,
        ];
    }
}
