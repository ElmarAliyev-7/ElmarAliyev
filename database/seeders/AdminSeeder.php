<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'username' => 'SuperAdmin',
            'name'     => 'Super',
            'surname'  => 'Admin',
            'role_id'  => 1,
            'email'    => 'liyevelmar02@gmail.com',
            'password' => Hash::make("Elmar@8212!"),
        ]);

    }
}
