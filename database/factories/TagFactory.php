<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Tag::class;

    public function definition()
    {
       return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'slug' => Str::slug($this->faker->name)
        ];
    }
}
