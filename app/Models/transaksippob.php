<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksippob extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "transaksippob";
    protected $primaryKey = "id_transaksippob";
    public $timestamps = false;
=======

    protected $table = 'transaksippob';

    protected $primaryKey = 'id_transaksippob';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'customer_ppob',
        'produk_transaksi_ppob',
        'harga_transaksi_ppob',
        'bayar_transaksi_ppob',
        'nomor_inputan',
        'status_ppob',

    ];

    public function customer()
    {
<<<<<<< HEAD
        return $this->belongsTo(Customer::class, "customer_ppob", "id_customer");
    }
    public function ppob()
    {
        return $this->belongsTo(ppob::class, "produk_transaksi_ppob", "id_ppob");
=======
        return $this->belongsTo(Customer::class, 'customer_ppob', 'id_customer');
    }

    public function ppob()
    {
        return $this->belongsTo(ppob::class, 'produk_transaksi_ppob', 'id_ppob');
>>>>>>> 0943348 (initial commit)
    }
}
