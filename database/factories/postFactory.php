<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<post>
 */
class postFactory extends Factory
{
  
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "discrption" => fake()->sentence(),
            "user_id" => User::inRandomOrder()->first()->id,
            "img"   => "posts/yXtSuBVWp106nE2cg1CIAk98bwwgMxpUFdEAdLzE.jpg" ,
            "content" => fake()->sentence() ,
        ];
    }
}
