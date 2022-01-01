<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'active' => rand(0,1) == 1,
            'nombre' => $this->faker->name(),
            'desc' => $this->faker->paragraph(),
            'precio' => $this->faker->randomFloat(),
            'costo' => $this->faker->randomFloat(),
//             'role' => $this->faker->randomElement(['adm','rh','tienda','profes']),
            'password' => '12345678qwerty', // password
            'remember_token' => Str::random(10),
        ];
    }
}
