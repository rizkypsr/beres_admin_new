<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class transaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transaksi::insert([
            'id_transaksi' => 1,
            'id_customer_transaksi' => 165150701111011,
            'tanggal_transaksi' => Carbon::create('2000', '01', '01'),
            'kategori_transaksi' => 'Jual Sampah',
            'produk_transaksi' => 'Ac',
            'qty_transaksi' => 1,
            'total_harga_transaksi' => 5000,
            'id_pembayaran' => 12341243,
            'status_transaksi' => 'selesai',

        ]);
    }
}
