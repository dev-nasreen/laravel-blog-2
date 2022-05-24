<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition()
    {
        // $id = rand(30, 300);
        // $image = "https://picsum.photos/id/".$id."/700/600.jpg";
        return [
            'title' => $this->faker->sentence(),
            'slug' =>Str::slug($this->faker->sentence()),
            'image' =>  $faker->url('http://lorempixel.com/400/200/sports/',640,480),
            'description'=> $this->faker->text(400),
            'category_id'=> function(){
                return Category::inRandomOrder()->first()->id;
            },
            'user_id'=> 1,
            
        ];
    }
}
