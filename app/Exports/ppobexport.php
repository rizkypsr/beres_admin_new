<?php

namespace App\Exports;

use App\Models\transaksippob;

/**
 * Mirrors the table on /logppob (TransaksippobController@ppob, transaksippob/logtransaksippob.blade.php).
 */
class ppobexport implements StreamableExport
{
    private int $no = 0;

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

    public function rows(): iterable
    {
        foreach (transaksippob::with('customer')->lazy(1000) as $data) {
            yield $this->map($data);
        }
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
