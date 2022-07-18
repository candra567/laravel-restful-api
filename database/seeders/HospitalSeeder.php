<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name_hospital'=>'Puskesmas somagede',
                'location_hospital'=>1,
                'name_doctor'=>'Prof Agung pambudi'
            ],
            [
                'name_hospital'=>'RSUD Banyumas',
                'location_hospital'=>1,
                'name_doctor'=>'Prof Herry sumargo'
            ],
            [
                'name_hospital'=>'RSUD Siaga Medika',
                'location_hospital'=>1,
                'name_doctor'=>'Dr Herman'
            ],
            [
                'name_hospital'=>'Puskesmas Purbalingga',
                'location_hospital'=>3,
                'name_doctor'=>'Dr Verronica'
            ],
            [
                'name_hospital'=>'Puskesmas 1 Susukan',
                'location_hospital'=>2,
                'name_doctor'=>'Dr Abraham'
            ],
            [
                'name_hospital'=>'Puskesmas 2 Susukan',
                'location_hospital'=>2,
                'name_doctor'=>'Dr Chriss'
            ]
        ];
        Hospital::insert($data);
    }
}
