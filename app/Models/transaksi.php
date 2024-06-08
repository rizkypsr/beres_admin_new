<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "transaksi";
    protected $primaryKey = "id_transaksi";
    public $timestamps = false;
=======

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_customer_transaksi',
        'tanggal_transaksi',
        'kategori_transaksi',
        'produk_transaksi',
        'tanggal_transaksi',
        'qty_transaksi',
        'jumlah_harga_transaksi',
        'id_pembayaran',
        'status_transaksi',

    ];

    public function customer()
    {
<<<<<<< HEAD
        return $this->belongsTo(Customer::class, "id_customer_transaksi", "nik_customer");
=======
        return $this->belongsTo(Customer::class, 'id_customer_transaksi', 'nik_customer');
>>>>>>> 0943348 (initial commit)
    }
}
