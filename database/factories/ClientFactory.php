<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "prenom" => $this->faker->firstName(),
            "nom" => $this->faker->lastName(),
            "telephone" => $this->faker->phoneNumber(),
            "ville" => $this->faker->city(),
            "date_naissance" => $this->faker->date(),
        ];
    }
}
