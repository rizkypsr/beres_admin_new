<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksijs extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = "transaksijs";
    protected $primaryKey = "id_transaksijs";
    public $timestamps = false;
=======

    protected $table = 'transaksijs';

    protected $primaryKey = 'id_transaksijs';

    public $timestamps = false;

>>>>>>> 0943348 (initial commit)
    protected $fillable = [
        'id_cs_js',
        'id_kc_js',
        'jenissampah_js',
        'satuan_js',
        'jumlah_js',
        'harga_js',
        'total_js',
        'status_js',

    ];
<<<<<<< HEAD
    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, "id_kc_js", "id_kecamatan");
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, "id_cs_js", "id_customer");
    }
    public function produkjs()
    {
        return $this->belongsTo(produkjs::class, "jenissampah_js", "id_js");
=======

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kc_js', 'id_kecamatan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_cs_js', 'id_customer')->withTrashed();
    }

    public function produkjs()
    {
        return $this->belongsTo(produkjs::class, 'jenissampah_js', 'id_js');
>>>>>>> 0943348 (initial commit)
    }
}
