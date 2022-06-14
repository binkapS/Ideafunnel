<?php

namespace Database\Factories;

use App\Binkap\Constant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::random(Constant::CATEGORY_ID_LENGTH),
            'author' => 'admin',
            'name' => $this->faker->word()
        ];
    }
}
