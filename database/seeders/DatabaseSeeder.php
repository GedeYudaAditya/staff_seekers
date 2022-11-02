<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('admin')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'username' => 'staff',
            'role' => 'staff',
            'status' => 'active',
            'password' => bcrypt('staff'),
            'bio' => 'I am a staff',
            'detailBio' => 'detail bio staff',
            'salary' => '1000000 - 2000000',
            'image' => 'https://picsum.photos/200/300'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Villa',
            'email' => 'villa@gmail.com',
            'username' => 'villa',
            'role' => 'villa',
            'status' => 'active',
            'password' => bcrypt('villa'),
            'bio' => 'I am a villa',
            'detailBio' => 'detail bio villa',
            'salary' => '1000000 - 2000000',
            'image' => 'https://picsum.photos/200/300'
        ]);
    }
}
