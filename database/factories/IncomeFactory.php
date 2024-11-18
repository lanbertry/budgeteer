<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class IncomeFactory extends Factory
{
    protected $model = \App\Models\Income::class;

    public function definition()
    {
        $incomeTypes = ['Allowance', 'Assistance', 'Profit', 'Salary', 'Savings', 'Stipend'];

        return [
            'user_id' => User::first()->id ?? 1,
            'type' => $this->faker->randomElement($incomeTypes),
            'amount' => $this->faker->randomFloat(2, 500, 5000),
            // Date will be set in the seeder for each specific day
        ];
    }
}


