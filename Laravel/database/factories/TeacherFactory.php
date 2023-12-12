<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'fax' => $this->faker->e164PhoneNumber(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'language' => $this->faker->languageCode(),
            'created_at' => $this->faker->dateTimeInInterval('-50 week', '+50 week'),
        ];
    }
}
