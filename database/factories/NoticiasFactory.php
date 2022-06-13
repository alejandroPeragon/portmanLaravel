<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->text(),

        ];
    }
}
