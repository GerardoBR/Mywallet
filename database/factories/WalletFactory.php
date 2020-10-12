<?php

namespace Database\Factories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition()
    {
        return [
            //
            'money' => $this->faker->numberBetween($min= 500 ,$max=900)
        ];
    }
}
