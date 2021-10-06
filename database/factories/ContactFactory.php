<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1,2),
            'email' =>$this->faker->safeEmail(),
            'postcode' =>$this->faker->randomLetter(8),
            'address' =>$this->faker->address(),
            'building_name' =>$this->faker->realText(10),
            'opinion' =>$this->faker->realText(30),
        ];
    }
}
