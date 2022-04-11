<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            [
                'name' => 'HCBP'
            ],
            [
                'name' => 'BRILINK'
            ],
            [
                'name' => 'USI'
            ],
            [
                'name' => 'SME'
            ],
            [
                'name' => 'MEDIUM'
            ],
            [
                'name' => 'CRA'
            ],
            [
                'name' => 'CRR'
            ],
            [
                'name' => 'RLT'
            ],
            [
                'name' => 'TIE'
            ],
            [
                'name' => 'RTC'
            ],
            [
                'name' => 'RTC'
            ],
            [
                'name' => 'RTB'
            ],
            [
                'name' => 'LOG'
            ],
            [
                'name' => 'MFN'
            ],
            [
                'name' => 'CONSUMER'
            ],
            [
                'name' => 'MICRO'
            ],
            [
                'name' => 'RMC'
            ],
            [
                'name' => 'ONS'
            ],
            [
                'name' => 'COP'
            ],
            [
                'name' => 'RDS'
            ]
        ]);
    }
}
