<?php

namespace App\Exports;

use App\Models\transaksijs;

/**
 * Mirrors the columns and role scoping of the jual sampah tables (/transaksijs, /logtransaksijs).
 */
class transaksijsexport implements StreamableExport
{
    public function query()
    {
        $query = transaksijs::query()
            ->with(['kecamatan', 'customer', 'produkjs'])
            ->orderBy('created_at', 'desc')
            // Tie-breaker so chunked reads never skip or repeat rows sharing a timestamp.
            ->orderBy('id_transaksijs');

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

    public function rows(): iterable
    {
        foreach ($this->query()->lazy(1000) as $data) {
            yield $this->map($data);
        }
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
