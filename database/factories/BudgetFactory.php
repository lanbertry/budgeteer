<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BudgetFactory extends Factory
{
    protected $model = \App\Models\Budget::class;

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

        $category = $this->faker->randomElement($categories);
        $type = $this->faker->randomElement($categoryToTypes[$category]);

        return [
            'user_id' => User::first()->id ?? 1,
            'type' => $type,
            'category' => $category,
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            // Dates will be set in the seeder for each specific range
        ];
    }
}



