<?php

namespace Database\Seeders;

use App\Models\Employe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employe::insert([
            [
                "nama" => "Syahril Syahputra",
                "pn" => "46108023",
                "department_id" => 1,
                "username" => "arhiel",
                "password" => "arhiel"
            ],
            [
                "nama" => "John Doe",
                "pn" => "56789",
                "department_id" => 1,
                "username" => "jhon",
                "password" => "jhon"
            ],
            [
                "nama" => "Contoso",
                "pn" => "901234567",
                "department_id" => 15,
                "username" => "contoso",
                "password" => "contoso"
            ],
            [
                "nama" => "Michele",
                "pn" => "224567",
                "department_id" => 2,
                "username" => "mitchele",
                "password" => "mitchele"
            ],

        ]);
    }
}
