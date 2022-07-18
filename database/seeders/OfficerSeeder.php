<?php

namespace Database\Seeders;

use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
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
            'id_card_officer'=>1234,
            'name_officer'=>'Dr Budi',
            'password_officer'=>password_hash(123,PASSWORD_DEFAULT),
            'regionals_officer'=>1
          ],
          [
            'id_card_officer'=>4567,
            'name_officer'=>'Dr Alex',
            'password_officer'=>password_hash(123,PASSWORD_DEFAULT),
            'regionals_officer'=>2
          ],
          [
            'id_card_officer'=>78910,
            'name_officer'=>'Dr Purnomo',
            'password_officer'=>password_hash(123,PASSWORD_DEFAULT),
            'regionals_officer'=>3
          ]
        ];
        Officer::insert($data);
    }
}
