<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Order::class;
    public function definition()
    {
        return [
            "nombre"=>$this->faker->word(),
            "fecha"=>$this->faker->dateTime(),
            "descripcion"=>$this->faker->paragraph(),
            "disponible"=>$this->faker->boolean()

           /* DB::table('products')->insert([
                'nombre' => 'Alicates',
                'descripcion' => 'Alicates molones',
                'precio' => 3.20,
            ]);*/

        ];
    }
}