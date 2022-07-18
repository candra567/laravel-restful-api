<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersVaksin>
 */
class UsersVaksinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_card_users_vaksin'=>rand(),
            'password_users_vaksin'=>password_hash('123',PASSWORD_DEFAULT),
            'name_users_vaksin'=>$this->faker->name('male'),
            'gender_users_vaksin'=>'male',
            'born_date_users_vaksin'=>$this->faker->date(),
            'regionals_users_vaksin'=>rand(1,3)
        ];
    }
}
