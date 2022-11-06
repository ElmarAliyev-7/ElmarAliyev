<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleAndPermission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            ['id'=> 1, 'name' => 'SuperAdmin'],
            ['id'=> 2, 'name' => 'Admin'],
            ['id'=> 3, 'name' => 'Standart user']
        ];
        Role::insert($roles);

        //Give All Permisssions to SuperAdmin
        $super_admin_permissions = [];
        $permissions = Permission::select('id')->get();

        foreach ($permissions as $permission) {
            array_push($super_admin_permissions, ['role_id' => 1, 'permission_id' => $permission->id]);
        }

        RoleAndPermission::insert($super_admin_permissions);
    }
}
