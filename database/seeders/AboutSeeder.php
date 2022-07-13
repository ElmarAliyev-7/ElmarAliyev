<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'fullname'    => 'Elmar Aliyev',
            'duty'        => 'Backend Developer',
            'description' => 'Hardworking,responsible, and determined person who is also eager to advance in his career path. Good at problem solving and critical thinking rather than focusing on problem itself. Moreover, owns effective communication skills and loves to expand network.',
            'from'        => 'Baku, Azerbaijan',
            'lives_in'    => 'Yeni Yasamal',
            'age'         => 20,
            'gender'      => 'male',
            'cv'          => public_path('cv/cv.pdf'),
            'image'       => 'front/assets/img/elmar.jpg',
        ]);
    }
}
