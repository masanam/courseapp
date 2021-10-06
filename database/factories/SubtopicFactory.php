<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Subtopic;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubtopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subtopic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order' => $this->faker->word,
        'name' => $this->faker->word,
        'topic_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'slug' => $this->faker->word,
        'no' => $this->faker->word,
        'youtube_url' => $this->faker->text
        ];
    }
}
