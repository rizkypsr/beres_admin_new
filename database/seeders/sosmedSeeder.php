<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sosmed;
=======
use App\Models\sosmed;
use Illuminate\Database\Seeder;
>>>>>>> 0943348 (initial commit)

class sosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sosmed::insert([
<<<<<<< HEAD
         [   
            'id_sosmed'=>1,
            'nama_sosmed'=>'whatsapp',
            'deskripsi_sosmed' => 628842424823 ,
        ],[
            'id_sosmed'=>2,
            'nama_sosmed'=>'telegram',
            'deskripsi_sosmed' => 't.me/halahla' ,
        ]
        ]);   
     }
=======
            [
                'id_sosmed' => 1,
                'nama_sosmed' => 'whatsapp',
                'deskripsi_sosmed' => 628842424823,
            ], [
                'id_sosmed' => 2,
                'nama_sosmed' => 'telegram',
                'deskripsi_sosmed' => 't.me/halahla',
            ],
        ]);
    }
>>>>>>> 0943348 (initial commit)
}
