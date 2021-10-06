<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order' => $this->faker->word,
        'name' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'slug' => $this->faker->word,
        'grade_id' => $this->faker->word,
        'subject_id' => $this->faker->word,
        'no' => $this->faker->word
        ];
    }
}
