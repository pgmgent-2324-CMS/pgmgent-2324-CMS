<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class MessageFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'user_email' => fake()->safeEmail(),
            'message' => fake()->text(),
            'created_at' => fake()->dateTimeInInterval('-50 week', '+50 week'),
        ];
    }
}