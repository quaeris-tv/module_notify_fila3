<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\NotifyTheme;

class NotifyThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = NotifyTheme::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(5, false),
            'lang' => $this->faker->word,
            'type' => $this->faker->word,
            'subject' => $this->faker->word,
            'body' => $this->faker->text,
            'body_html' => $this->faker->text,
            'from' => $this->faker->word,
        ];
    }
}
