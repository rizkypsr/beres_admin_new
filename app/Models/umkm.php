<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "umkm";
    protected $primaryKey = "id_umkm";
    public $timestamps = false;
=======

    protected $table = 'umkm';

    protected $primaryKey = 'id_umkm';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_kecamatan_umkm',
        'nama_umkm',
        'deskripsi_umkm',
        'gambar_umkm',
<<<<<<< HEAD
        
        
    ];
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kecamatan_umkm","id_kecamatan");
=======

    ];

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan_umkm', 'id_kecamatan');
>>>>>>> 0943348 (initial commit)
    }
}
