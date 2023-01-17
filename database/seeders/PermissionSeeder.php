<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::Create([
            'name' => 'admin'
        ]);

        $teacher = Role::create([
            'name' => 'teacher'
        ]);

        Permission::Create([
            'name' => 'list areas'
        ]);
        Permission::Create([
            'name' => 'create areas'
        ]);
        Permission::Create([
            'name' => 'update areas'
        ]);
        Permission::Create([
            'name' => 'delete areas'
        ]);


        Permission::Create([
            'name' => 'list courses'
        ]);
        Permission::Create([
            'name' => 'create courses'
        ]);
        Permission::Create([
            'name' => 'update courses'
        ]);
        Permission::Create([
            'name' => 'delete courses'
        ]);


        $admin->givePermissionTo(permission::all());
        $teacher->givePermissionTo(['list courses','create courses','update courses','delete courses']);
    }
}
