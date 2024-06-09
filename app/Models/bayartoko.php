<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayartoko extends Model
{
    use HasFactory;

    protected $table = 'bayartoko';

    protected $primaryKey = 'id_bayar';

    public $timestamps = false;

    protected $fillable = [
        'id_kecamatan_bayar',
        'pengirim_bayar',
        'toko_bayar',
        'tanggal_bayar',
        'nominal_bayar',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan_bayar', 'id_kecamatan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'pengirim_bayar', 'id_customer')->withTrashed();
    }

    public function customertoko()
    {
        return $this->belongsTo(Customer::class, 'toko_bayar', 'id_customer')->withTrashed();
    }
}
