<?php

namespace Database\Factories;

use App\Enums\SupportStatusType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'subject' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'status' => SupportStatusType::RECEPTION,
        ];
    }
}
