<?php

namespace App\Exports;

use App\Models\transaksijs;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Mirrors the columns and role scoping of LogTransaksiJsDataTable (/logtransaksijs).
 */
class transaksijsexport implements FromQuery, ShouldAutoSize, WithHeadings, WithMapping
{
    public function query()
    {
        $query = transaksijs::query()
            ->with(['kecamatan', 'customer', 'produkjs'])
            ->orderBy('created_at', 'desc');

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kc_js', auth()->user()->id_kecamatan_user);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Customer',
            'Kecamatan',
            'Alamat',
            'Jenis Sampah',
            'Satuan',
            'Jumlah',
            'Harga',
            'Total',
            'Tanggal',
            'Status',
        ];
    }

    public function map($data): array
    {
        return [
            $data->id_transaksijs,
            $data->customer?->nama,
            $data->kecamatan?->nama_kecamatan,
            $data->customer?->alamat_customer ?: '-',
            $data->produkjs?->judul_js,
            $data->satuan_js,
            $data->jumlah_js,
            $data->harga_js,
            $data->total_js,
            $data->created_at,
            strtoupper((string) $data->status_js),
        ];
    }
}
