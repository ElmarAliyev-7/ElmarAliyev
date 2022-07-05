<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleAndPermission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin         = Role::create(['name' => 'Admin']);
        $moderator     = Role::create(['name' => 'Moderator']);
        $standart_user = Role::create(['name' => 'Standart user']);

        //Give All Permisssions to Admin
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            RoleAndPermission::create([
                'role_id' => 1,
                'permission_id' => $permission->id
            ]);
        }
    }
}
