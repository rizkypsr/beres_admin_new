<?php

namespace Database\Seeders;

use App\Models\kecamatan;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 0943348 (initial commit)
use Illuminate\Database\Seeder;

class kecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kecamatan::insert([
<<<<<<< HEAD
            'id_kecamatan'=>1,
            'id_kota_kecamatan'=>1,
            'nama_kecamatan'=>'KedungKandang',
            
=======
            'id_kecamatan' => 1,
            'id_kota_kecamatan' => 1,
            'nama_kecamatan' => 'KedungKandang',

>>>>>>> 0943348 (initial commit)
        ]);
    }
}
