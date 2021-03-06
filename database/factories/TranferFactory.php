<?php

namespace Database\Factories;

use App\Models\Tranfer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class TranferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tranfer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'description' => $this->faker->text($maxNbChars = 200),
            'amount' =>  $this->faker->numberBetween($min = 10, $max = 90),
            'wallet_id' => $this->faker->randomDigitNotNull
        ];
    }
}
