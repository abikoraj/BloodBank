<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'phone' => '9800000000',
            'password' => bcrypt('Admin@123'),
            'name' => 'Admin',
            'role' => 1
        ]);
    }
}
