<?php

namespace Database\Factories;

use App\Binkap\Constant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all('id');
        $array = [
            Constant::ARTICLE_TYPE_BREAKING,
            Constant::ARTICLE_TYPE_UPDATE
        ];
        $categories = Category::all('id');
        return [
            'id' => Str::random(Constant::ARTICLE_ID_LENGTH),
            'author' => $users[0]->id,
            'topic' => $this->faker->sentence(\random_int(7, 15)),
            'category' => $categories[\random_int(0, \count($categories) - 1)],
            'type' => $array[\random_int(0, 1)],
            'body' => $this->faker->sentence(\random_int(100, 500)),
            'tags' => \implode(' ', $this->faker->words(5)),
            'status' => Constant::ARTICLE_STATUS_APPROVED
        ];
    }
}
