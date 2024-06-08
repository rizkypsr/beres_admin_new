<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qurbansampah extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "qurbansampah";
    protected $primaryKey = "id_qurban";
    public $timestamps = false;
=======

    protected $table = 'qurbansampah';

    protected $primaryKey = 'id_qurban';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'gambar_qurban',
        'nama_qurban',
        'deskripsi_qurban',
<<<<<<< HEAD
        
=======

>>>>>>> 0943348 (initial commit)
    ];
}
