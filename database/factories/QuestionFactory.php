<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'quiz_id' => 1, // Placeholder, should dynamically set when using the factory
            'number' => $this->faker->unique()->numberBetween(1, 100), // Generates a unique number for the question
            'text' => $this->faker->sentence($nbWords = 6, $variableNbWords = true), // Generates a random question text
        ];
    }
}
