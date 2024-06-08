<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
=======
use App\Models\User;
use Illuminate\Database\Seeder;
>>>>>>> 0943348 (initial commit)
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id_kecamatan_user' => 1,
                'email' => 'superadmin@gmail.com',
                'name' => 'superadmin',
                'password' => Hash::make('password'),
                'role' => 'superadmin',
                'tempat_lahir' => 'surabaya',
<<<<<<< HEAD
                'tgl_lahir' => '2000-01-01'
=======
                'tgl_lahir' => '2000-01-01',
>>>>>>> 0943348 (initial commit)
            ],
            [
                'id_kecamatan_user' => 1,
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'tempat_lahir' => 'surabaya',
<<<<<<< HEAD
                'tgl_lahir' => '2000-01-01'
=======
                'tgl_lahir' => '2000-01-01',
>>>>>>> 0943348 (initial commit)
            ], [
                'id_kecamatan_user' => 1,
                'email' => 'adminppob@gmail.com',
                'name' => 'adminppob',
                'password' => Hash::make('password'),
                'role' => 'adminppob',
                'tempat_lahir' => 'surabaya',
<<<<<<< HEAD
                'tgl_lahir' => '2000-01-01'
=======
                'tgl_lahir' => '2000-01-01',
>>>>>>> 0943348 (initial commit)
            ],

        ]);
    }
}
