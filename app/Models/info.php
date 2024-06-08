<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "info";
    protected $primaryKey = "id_info";
    public $timestamps = false;
    protected $fillable = [
        'gambar_info',
        
=======

    protected $table = 'info';

    protected $primaryKey = 'id_info';

    public $timestamps = false;

    protected $fillable = [
        'gambar_info',

>>>>>>> 0943348 (initial commit)
    ];
}
