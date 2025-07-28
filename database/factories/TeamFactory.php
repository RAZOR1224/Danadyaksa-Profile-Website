<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = ['Managing Partner', 'Senior Associate', 'Litigation Specialist', 'Corporate Counsel', 'Junior Associate'];

        return [
            'full_name' => $this->faker->name(),
            'position' => $this->faker->randomElement($positions),
            'description' => $this->faker->sentence(20),
            'image' => 'team/placeholder.png', // <-- Diperbarui dari .jpg menjadi .png
        ];
    }
}