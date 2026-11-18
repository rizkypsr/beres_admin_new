<?php

namespace App\Exports;

use App\Models\Customer;

class customerexport implements StreamableExport
{
    public function headings(): array
    {
        return [
            'Id',
            'Kecamatan',
            'Nama Customer',
            'Alamat',
            'Saldo',
            'Pin',
            'No Handphone',
            'Role',
            'Tempat Lahir',
            'Tanggal Lahir',
        ];
    }

    public function rows(): iterable
    {
        $query = Customer::where('role_customer', 'customer')->with('kecamatan');

        if (auth()->user()->role != 'superadmin') {
            $query->where('id_kecamatan_customer', auth()->user()->id_kecamatan_user);
        }

        foreach ($query->lazy(1000) as $cust) {
            yield $this->map($cust);
        }
    }

    public function map($cust): array
    {
        return [
            $cust->id_customer,
            $cust->kecamatan?->nama_kecamatan,
            $cust->nama,
            $cust->alamat_customer,
            $cust->saldo_customer,
            $cust->pin_customer,
            $cust->no_hp_customer,
            $cust->role_customer,
            $cust->tempat_lahir,
            $cust->tgl_lahir,
        ];
    }
}
