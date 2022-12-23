<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       
        return [
            //
            'nombre' => fake()->streetName(),
            'categoria' => fake()->randomElement(['terror', 'accion', 'suspenso', 'animacion']),
            'lanzamiento' => fake()->date(),
            'descripcion' => fake()->text(),
        ];
    }
}
