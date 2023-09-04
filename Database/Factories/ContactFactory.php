<?php

declare(strict_types=1);

namespace Modules\Notify\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Notify\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // 'model_id' => $this->faker->randomNumber(5, false),
=======
            'model_id' => $this->faker->integer,
>>>>>>> e73574f (up)
=======
            // 'model_id' => $this->faker->integer,
>>>>>>> 4a1a664 (up)
=======
            // 'model_id' => $this->faker->integer,
>>>>>>> fe06862 (.)
            'model_type' => $this->faker->word,
            'contact_type' => $this->faker->word,
            'value' => $this->faker->word,
            'verified_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'created_at' => $this->faker->dateTime,
            'updated_by' => $this->faker->word,
            'created_by' => $this->faker->word,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // 'user_id' => $this->faker->randomNumber(5, false),
=======
            'user_id' => $this->faker->integer,
>>>>>>> e73574f (up)
=======
            // 'user_id' => $this->faker->integer,
>>>>>>> 4a1a664 (up)
=======
            // 'user_id' => $this->faker->integer,
>>>>>>> fe06862 (.)
            'token' => $this->faker->word,
        ];
    }
}