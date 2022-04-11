<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Absensi::insert([
            [
                'employe_id' => 1,
                'time_scan' => date("Y-m-d H:i:s")
            ],
            [
                'employe_id' => 2,
                'time_scan' => date("Y-m-d H:i:s")
            ],
            [
                'employe_id' => 3,
                'time_scan' => date("Y-m-d H:i:s")
            ],
            [
                'employe_id' => 4,
                'time_scan' => date("Y-m-d H:i:s")
            ],

        ]);
    }
}
