<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Contract;
use App\Models\Report;
use App\Models\RequestStaff;
use App\Models\RequestVilla;
use App\Models\Requirement;
use App\Models\Transaction;
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
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'role' => 'admin',
            'status' => 'active',
            'image' => 'default.png',
            'password' => bcrypt('admin'),
            'phone' => '081234567890',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'username' => 'staff',
            'age' => '20',
            'role' => 'staff',
            'status' => 'active',
            'password' => bcrypt('staff'),
            'bio' => 'I am a staff',
            'detailBio' => 'detail bio staff',
            'salary' => '1000000 - 2000000',
            'image' => 'default.png',
            'address' => 'Jl. Kebon Jeruk No. 1, Jakarta Barat',
            'phone' => '081234567890'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Person Villa',
            'villa_name' => 'Villa 1',
            'email' => 'villa@gmail.com',
            'age' => '20',
            'username' => 'villa',
            'role' => 'villa',
            'status' => 'active',
            'password' => bcrypt('villa'),
            'bio' => 'I am a villa',
            'detailBio' => 'detail bio villa',
            'salary' => '1000000 - 2000000',
            'image' => 'default.png',
            'villa_image' => 'default.png',
            'address' => 'Jl. Kebon Jeruk No. 1, Jakarta Barat',
            'phone' => '081234567890'
        ]);

        Requirement::factory(100)->create();

        RequestStaff::factory(100)->create();
        RequestVilla::factory(100)->create();

        Announcement::factory(100)->create();

        Report::factory(100)->create();

        Contract::factory(30)->create();

        Transaction::factory(30)->create();
    }
}
