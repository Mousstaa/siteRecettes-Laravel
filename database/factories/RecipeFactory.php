<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(10),
            'content' => $this->faker->paragraph,
            'ingredients' => $this->faker->paragraph,
            'url' => Str::random(200),
            'tags' => $this->faker->paragraph,
            'image' =>'visuelNonDisponible.jpg',
            'date' => now(),
            'status' => Str::random(10),
        ];
    }
}
