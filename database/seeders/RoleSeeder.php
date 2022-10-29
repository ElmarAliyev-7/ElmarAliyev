<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleAndPermission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'SuperAdmin'],
            ['name' => 'Admin'],
            ['name' => 'Standart user']
        ];
        DB::table('roles')->insert($roles);


        //Give All Permisssions to SuperAdmin
        $super_admin_permissions = [];
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            array_push($super_admin_permissions, ['role_id' => 1, 'permission_id' => $permission->id]);
        }
        DB::table('role_and_permissions')->insert($super_admin_permissions);
    }
}
