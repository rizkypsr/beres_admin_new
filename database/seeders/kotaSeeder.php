<?php

namespace Database\Seeders;

use App\Models\kota;
<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 0943348 (initial commit)
use Illuminate\Database\Seeder;

class kotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kota::insert([
<<<<<<< HEAD
            'id_kota'=>1,
            'nama_kota'=>'Malang',
            
=======
            'id_kota' => 1,
            'nama_kota' => 'Malang',

>>>>>>> 0943348 (initial commit)
        ]);
    }
}
