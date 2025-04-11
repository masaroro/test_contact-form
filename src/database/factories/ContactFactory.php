<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstName,
            'last_name'=> $this->faker->lastName,
            'gender'=> $this->faker->numberBetween(1,3),
            'email'=> $this->faker->unique()->safeEmail,
            'tel'=> $this->faker->numerify('080########'),
            'address'=> $this->faker->prefecture() . $this->faker->city() . $this->faker->streetAddress(),
            'building'=> $this->faker->secondaryAddress(),
            'category_id'=> $this->faker->randomElement(Category::pluck('id')),
            'detail'=> $this->faker->realText(300),
        ];
    }
}
