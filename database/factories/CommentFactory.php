<?php

namespace Database\Factories;

use App\Binkap\Constant;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $articles = Article::all('id');
        $count = $articles->count() - 1;
        return [
            'id' => Str::random(Constant::COMMENT_ID_LENGTH),
            'article' => $articles[\random_int(0, $count)]->id,
            'author' => $this->faker->word(),
            'body' => $this->faker->sentence()
        ];
    }
}
