<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\challenges;
use App\Models\elearning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
=======
use App\Models\elearning;
use Illuminate\Database\Seeder;
>>>>>>> 0943348 (initial commit)

class elearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        elearning::insert([
            [
<<<<<<< HEAD
                'judul' => "challenge 1",
                'subjudul' => "desk challenge 1",
=======
                'judul' => 'challenge 1',
                'subjudul' => 'desk challenge 1',
>>>>>>> 0943348 (initial commit)
                'deskripsi' => 'image',
                'link' => 'link',
                'point' => 10,
                'status' => 1,
                'challenge_id' => 1,
<<<<<<< HEAD
                'user_id' => 12000
=======
                'user_id' => 12000,
>>>>>>> 0943348 (initial commit)
            ],
        ]);
    }
}
