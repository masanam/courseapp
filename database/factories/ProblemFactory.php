<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Problem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Problem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->text,
        'choices' => $this->faker->text,
        'answers' => $this->faker->text,
        'subtopic_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'answer_type' => $this->faker->word,
        'no' => $this->faker->word,
        'solutions' => $this->faker->text,
        'question_type' => $this->faker->word
        ];
    }
}
