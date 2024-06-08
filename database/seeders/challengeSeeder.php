<?php

namespace Database\Seeders;

use App\Models\challenges;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 0943348 (initial commit)

class challengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        challenges::insert([
            [
<<<<<<< HEAD
                'judul' => "challenge 1",
                'deskripsi' => "desk challenge 1",
=======
                'judul' => 'challenge 1',
                'deskripsi' => 'desk challenge 1',
>>>>>>> 0943348 (initial commit)
                'image' => 'image',
                'hari' => 'senin',
            ],
            [
<<<<<<< HEAD
                'judul' => "chanllegen 2",
                'deskripsi' => "desk challenge 2",
=======
                'judul' => 'chanllegen 2',
                'deskripsi' => 'desk challenge 2',
>>>>>>> 0943348 (initial commit)
                'image' => 'image',
                'hari' => 'selasa',
            ],
            [
<<<<<<< HEAD
                'judul' => "chanllegen 3",
                'deskripsi' => "desk challenge 3",
=======
                'judul' => 'chanllegen 3',
                'deskripsi' => 'desk challenge 3',
>>>>>>> 0943348 (initial commit)
                'image' => 'image',
                'hari' => 'rabu',
            ],
            [
<<<<<<< HEAD
                'judul' => "chanllegen 4",
                'deskripsi' => "desk challenge 4",
=======
                'judul' => 'chanllegen 4',
                'deskripsi' => 'desk challenge 4',
>>>>>>> 0943348 (initial commit)
                'image' => 'image',
                'hari' => 'kamis',
            ],
            [
<<<<<<< HEAD
                'judul' => "chanllegen 5",
                'deskripsi' => "desk challenge 5",
=======
                'judul' => 'chanllegen 5',
                'deskripsi' => 'desk challenge 5',
>>>>>>> 0943348 (initial commit)
                'image' => 'image',
                'hari' => 'jumat',
            ],
        ]);
    }
}
