<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Income;
use App\Models\Expenses;
use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = \App\Models\User::first();

        if (!$user) {
            // Ensure there is at least one user
            $user = \App\Models\User::factory()->create();
        }

        $startDate = Carbon::today()->startOfYear();
        $endDate = Carbon::today()->endOfYear();

        while ($startDate->lessThanOrEqualTo($endDate)) {
            // Generate income for the day
            Income::factory()->create([
                'user_id' => $user->id,
                'date' => $startDate,
            ]);

            // Generate expense for the day
            Expenses::factory()->create([
                'user_id' => $user->id,
                'date' => $startDate,
            ]);

            // Generate a weekly budget if it's Monday
            if ($startDate->isMonday()) {
                Budget::factory()->create([
                    'user_id' => $user->id,
                    'start_date' => $startDate->copy(),
                    'end_date' => $startDate->copy()->addDays(6), // 1-week budget
                ]);
            }

            // Generate a monthly budget if it's the first day of the month
            if ($startDate->day === 1) {
                Budget::factory()->create([
                    'user_id' => $user->id,
                    'start_date' => $startDate->copy(),
                    'end_date' => $startDate->copy()->endOfMonth(), // Full month budget
                ]);
            }

            $startDate->addDay();
        }
    }
}


