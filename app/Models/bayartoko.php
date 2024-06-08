<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayartoko extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "bayartoko";
    protected $primaryKey = "id_bayar";
    public $timestamps = false;
=======

    protected $table = 'bayartoko';

    protected $primaryKey = 'id_bayar';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_kecamatan_bayar',
        'pengirim_bayar',
        'toko_bayar',
        'tanggal_bayar',
        'nominal_bayar',
    ];
<<<<<<< HEAD
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan_bayar","id_kecamatan");
    }
    public function customer()
    {
        return $this->belongsTo(customer::class, "pengirim_bayar","id_customer");
    }
    public function customertoko()
    {
        return $this->belongsTo(customer::class, "toko_bayar","id_customer");
    }
}

=======

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan_bayar', 'id_kecamatan');
    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'pengirim_bayar', 'id_customer');
    }

    public function customertoko()
    {
        return $this->belongsTo(customer::class, 'toko_bayar', 'id_customer');
    }
}
>>>>>>> 0943348 (initial commit)
