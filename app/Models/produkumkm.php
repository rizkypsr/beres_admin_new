<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produkumkm extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "produk_umkm";
    protected $primaryKey = "id_produk_umkm";
    public $timestamps = false;
=======

    protected $table = 'produk_umkm';

    protected $primaryKey = 'id_produk_umkm';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_umkm_produk',
        'nama_produk_umkm',
        'gambar_produk_umkm',
        'deskripsi_produk_umkm',
<<<<<<< HEAD
        
        
    ];
    public function umkm()
    {
        return $this->belongsTo(umkm::class, "id_umkm_produk","id_umkm");
=======

    ];

    public function umkm()
    {
        return $this->belongsTo(umkm::class, 'id_umkm_produk', 'id_umkm');
>>>>>>> 0943348 (initial commit)
    }
}
