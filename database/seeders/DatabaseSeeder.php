<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class
        ]);

        User::factory(10)->create();
        Department::factory(5)->create();
        Area::factory(10)->create();
        Teacher::factory(10)->create();
        Course::factory(20)->create();

        $admin = User::find(1);
        $admin->assignRole('admin');

        $teacher = User::find(2);
        $teacher->assignRole('teacher');

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
