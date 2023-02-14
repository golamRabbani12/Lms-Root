<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            $user = new User();
            $user ->name ='Super Admin';
            $user->email ='admin@example.com';
            $user->password =bcrypt('password');
            $user->save();


            $role = Role::create([
                'name' => 'Super Admin',
            ]);

            $permission = Permission::create([
                'name' => 'create-admin',
            ]);

            $role->givePermissionTo($permission);
            $permission->assignRole($role);

            $user->assignRole($role);



            // Leads Create

            Lead::factory()->count(100)->create();

            $course = Course::create([
                'name' => 'Laravel',
                'slug' => 'Laravel',
                'description' => 'LaravLaravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                'image' => 'https://laravel.com/img/logotype.min.svg',
                'price' => 500
            ]);

            Curriculum::factory()->count(10)->create();
    }
}
