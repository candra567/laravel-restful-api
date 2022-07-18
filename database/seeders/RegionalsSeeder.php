<?php

namespace Database\Seeders;

use App\Models\Regionals;
use Database\Factories\RegionalsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionalsSeeder extends Seeder
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
         'name_regionals'=>'Banyumas'
        ],
        [
            'name_regionals'=>'Banjarnegara'
        ],
        [
         'name_regionals'=>'Purbalingga'
        ],
       
       ];
       Regionals::insert($data);
    }
}
