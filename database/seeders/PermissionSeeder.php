<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Create User']); // 1
        Permission::create(['name' => 'Update User']); // 2
        Permission::create(['name' => 'Delete User']); // 3
        Permission::create(['name' => 'Create Skill']); // 4
        Permission::create(['name' => 'Delete Skill']); // 5
        Permission::create(['name' => 'Create Experience']); // 6
        Permission::create(['name' => 'Delete Experience']); // 7
        Permission::create(['name' => 'Create Project']); // 8
        Permission::create(['name' => 'Update Project']); // 9
        Permission::create(['name' => 'Delete Project']); // 10
        Permission::create(['name' => 'Update HomePage']); // 11
        Permission::create(['name' => 'Update AboutPage']); // 12
        Permission::create(['name' => 'Delete Message']); // 13
        Permission::create(['name' => 'View Messages']); //14
    }
}
