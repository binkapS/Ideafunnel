<?php

namespace Database\Factories;

use App\Binkap\Constant;
use App\Models\User;
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
        $users = User::all('id');
        return [
            'id' => Str::random(Constant::CATEGORY_ID_LENGTH),
            'author' => $users[0]->id,
            'name' => $this->faker->word()
        ];
    }
}
