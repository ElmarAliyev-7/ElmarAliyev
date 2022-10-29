<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'Create User'], // 1
            ['name' => 'Update User'], // 2
            ['name' => 'Delete User'], // 3
            ['name' => 'Create Skill'], // 4
            ['name' => 'Delete Skill'], // 5
            ['name' => 'Create Experience'], // 6
            ['name' => 'Delete Experience'], // 7
            ['name' => 'Create Project'], // 8
            ['name' => 'Update Project'], // 9
            ['name' => 'Delete Project'], // 10
            ['name' => 'Update HomePage'],// 11
            ['name' => 'Update AboutPage'], // 12
            ['name' => 'Delete Message'], // 13
            ['name' => 'View Messages'], //14
            ['name' => 'Update Experience'], //15
            ['name' => 'Create Blog'], // 16
            ['name' => 'Update Blog'], // 17
            ['name' => 'Delete Blog'], // 18
        ];

        DB::table('permissions')->insert($permissions);
    }
}
