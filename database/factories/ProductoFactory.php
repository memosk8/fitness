<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
   /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
   protected $model = Producto::class;

   /**
    * Define the model's default state.
    *
    * @return array
    */
   public function definition()
   {
      return [
         'name' => $this->faker->word(),
         'desc' => $this->faker->paragraph(4),
         'precio' => $this->faker->randomFloat(3,10,500),
         'costo' => $this->faker->randomFloat(3,10,500)
      ];
   }
}
