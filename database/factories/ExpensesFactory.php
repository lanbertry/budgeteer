<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class ExpensesFactory extends Factory
{
    protected $model = \App\Models\Expenses::class;

    public function definition()
    {
        $categories = [
            'Education', 'Entertainment', 'Food', 'Health', 'Miscellaneous',
            'Shopping', 'Transportation', 'Utilities'
        ];

        $categoryToTypes = [
            'Education' => ['Tuition', 'Books', 'Courses'],
            'Entertainment' => ['Movies', 'Games', 'Concerts'],
            'Food' => ['Breakfast', 'Lunch', 'Dinner', 'Snack'],
            'Health' => ['Doctor', 'Medicine', 'Gym'],
            'Miscellaneous' => ['Gift', 'Donation'],
            'Shopping' => ['Clothing', 'Electronics'],
            'Transportation' => ['Bus', 'Taxi', 'Flight'],
            'Utilities' => ['Electricity', 'Water', 'Internet']
        ];

        // Select a random category
        $category = $this->faker->randomElement($categories);
        $type = $this->faker->randomElement($categoryToTypes[$category]);

        // Log or output the generated values for verification
        Log::info("Generated expense - Category: $category, Type: $type");

        return [
            'user_id' => User::first()->id ?? 1,
            'category' => $category,
            'type' => $type,
            'amount' => $this->faker->randomFloat(2, 10, 500),
            // Date will be set in the seeder for each specific day
        ];
    }

}



