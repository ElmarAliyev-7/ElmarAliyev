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
        $admin = new User;
        $admin->username = "admin";
        $admin->name     = "Admin";
        $admin->surname  = "Admin";
        $admin->role_id  = 1; //1 - Admin Role (id)
        $admin->email    = "admin@gmail.com";
        $admin->password = Hash::make("1234");
        $admin->save();
    }
}
