<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "kota";
    protected $primaryKey = "id_kota";
    public $timestamps = false;
    protected $fillable = [
        'nama_kota',
        
=======

    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    public $timestamps = false;

    protected $fillable = [
        'nama_kota',

>>>>>>> 0943348 (initial commit)
    ];

    public function kecamatan()
    {
<<<<<<< HEAD
        return $this->hasOne(kecamatan::class, "id_kota_kecamatan");
=======
        return $this->hasOne(kecamatan::class, 'id_kota_kecamatan');
>>>>>>> 0943348 (initial commit)
    }
}
