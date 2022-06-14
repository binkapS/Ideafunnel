<?php

namespace Database\Factories;

use App\Binkap\Constant;
use App\Models\Category;
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
        $array = [
            Constant::ARTICLE_TYPE_BREAKING,
            Constant::ARTICLE_TYPE_UPDATE
        ];
        return [
            'id' => Str::random(Constant::ARTICLE_ID_LENGTH),
            'author' => 'admin',
            'topic' => $this->faker->sentence(\random_int(7, 15)),
            'category' => Category::latest()->limit(1)->get('id')[0]->id,
            'type' => $array[\random_int(0, 1)],
            'body' => $this->faker->sentence(\random_int(100, 500)),
            'tags' => \implode(',', $this->faker->words(5))
        ];
    }
}
