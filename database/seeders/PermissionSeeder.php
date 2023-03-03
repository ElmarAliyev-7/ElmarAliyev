<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RoleAndPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ['id' => 1,'name' => 'Create User', 'type' => 1],
            ['id' => 2,'name' => 'Update User', 'type' => 1],
            ['id' => 3,'name' => 'Delete User', 'type' => 1],

            ['id' => 4,'name' => 'Create Skill', 'type' => 2],
            ['id' => 5,'name' => 'Delete Skill', 'type' => 2],

            ['id' => 6,'name' => 'Create Experience', 'type' => 2],
            ['id' => 15,'name' => 'Update Experience', 'type' => 2],
            ['id' => 7,'name' => 'Delete Experience', 'type' => 2],

            ['id' => 8,'name' => 'Create Project', 'type' => 2],
            ['id' => 9,'name' => 'Update Project', 'type' => 2],
            ['id' => 10,'name' => 'Delete Project', 'type' => 2],

            ['id' => 11,'name' => 'Update HomePage', 'type' => 2],
            ['id' => 12,'name' => 'Update AboutPage', 'type' => 2],

            ['id' => 13,'name' => 'Delete Message', 'type' => 1],
            ['id' => 14,'name' => 'View Messages', 'type' => 1],

            ['id' => 16,'name' => 'Create Blog', 'type' => 3],
            ['id' => 17,'name' => 'Update Blog', 'type' => 3],
            ['id' => 18,'name' => 'Delete Blog', 'type' => 3],

            ['id' => 19,'name' => 'Create Task', 'type' => 3],
            ['id' => 20,'name' => 'Update Task', 'type' => 3],
            ['id' => 21,'name' => 'Delete Task', 'type' => 3],
        ];

        Permission::insert($permissions);

        //Give All Permisssions to SuperAdmin
        $super_admin_permissions = [];
        $permissions = Permission::select('id')->orderBy('id', 'asc')->get();

        foreach ($permissions as $permission) {
            array_push($super_admin_permissions, ['role_id' => 1, 'permission_id' => $permission->id]);
        }
        RoleAndPermission::insert($super_admin_permissions);
    }
}
