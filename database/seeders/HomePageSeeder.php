<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomePage::create([
            'title' => 'Welcome',
            'subtitle' => 'Elmar Aliyev',
            'duty' => 'Backend Developer',
            'background' => 'front/assets/img/bg_image_1.jpg'
        ]);
    }
}
