<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Menus;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->randomDigitNotNull,
        'type' => $this->faker->randomDigitNotNull,
        'title' => $this->faker->word,
        'content' => $this->faker->text,
        'picture' => $this->faker->word,
        'meta_title' => $this->faker->text,
        'meta_keyword' => $this->faker->text,
        'description' => $this->faker->text,
        'link' => $this->faker->word,
        'orderid' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->randomDigitNotNull,
        'created_by' => $this->faker->randomDigitNotNull,
        'updated_by' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
