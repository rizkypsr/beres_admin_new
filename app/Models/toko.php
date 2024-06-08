<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Toko extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = "toko";

    protected $primaryKey = "id_toko";
=======
    protected $table = 'toko';

    protected $primaryKey = 'id_toko';
>>>>>>> 0943348 (initial commit)

    public $timestamps = false;

    protected $fillable = [
        'id_kecamatan_toko',
        'nama_toko',
        'alamat_toko',
        'saldo_toko',
        'pin_toko',
        'no_hp_toko',
    ];

    public function transaksi()
    {
<<<<<<< HEAD
        return $this->hasMany(transaksi::class, "id_customer_transaksi", "nik_customer");
=======
        return $this->hasMany(transaksi::class, 'id_customer_transaksi', 'nik_customer');
>>>>>>> 0943348 (initial commit)
    }

    public function kecamatan()
    {
<<<<<<< HEAD
        return $this->belongsTo(kecamatan::class, "id_kecamatan_toko", "id_kecamatan");
=======
        return $this->belongsTo(kecamatan::class, 'id_kecamatan_toko', 'id_kecamatan');
>>>>>>> 0943348 (initial commit)
    }

    public function user_challenge(): MorphOne
    {
        return $this->morphOne(UserChallenge::class, 'user');
    }
}
