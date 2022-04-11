<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [

                'email' => 'arhiel@gmail.com',
                'name' => 'Arhiel',
                'password' => Hash::make("12345abcde"),
                'status' => 'aktif',
                'role' => 'admin',
            ],
            [

                'email' => 'HCBP@brimalang.co.id',
                'name' => 'HCBP',
                'password' => Hash::make("12345abcde"),
                'status' => 'aktif',
                'role' => 'admin',
            ],
            [

                'email' => 'monitor@brimalang.co.id',
                'name' => 'Monitor Sscan',
                'password' => Hash::make("monitor"),
                'status' => 'aktif',
                'role' => 'monitor',
            ],
        ]);
    }
}
