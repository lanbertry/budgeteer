<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //    return view('dashboard');
    //})->name('dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/expenses', function () {
        return view('expenses');
    })->name('expenses');

    Route::get('/summary', function () {
        return view('summary');
    })->name('summary');
    // ->middleware('verify_email');

    Route::get('/budget', function () {
        return view('budget');
    })->name('budget');


    Route::controller(ExpensesController::class)->group(function () {
        Route::post('/expensesadd', 'expensesAdd')->name('expenses.add');
        Route::get('/get-user-expenses', 'getUserExpenses')->name('get.user.expenses');

    });

    Route::controller(BudgetController::class)->group(function () {
        Route::get('/get-user-budgets', 'getUserBudgets')->name('get.user.budgets');
        Route::post('/budgetadd', 'budgetAdd')->name('budget.add');

    });

    Route::controller(IncomeController::class)->group(function () {
        Route::get('/get-user-incomes', 'getUserIncomes')->name('get.user.incomes');
        Route::post('/incomeadd', 'incomeAdd')->name('income.add');
        Route::get('/dailyallowance', 'dailyAllowance')->name('get.daily.allowance');
        Route::get('/dailyspending', 'dailySpending')->name('get.daily.spending');
        Route::get('/dailysaving', 'dailySaving')->name('get.daily.saving');
        Route::get('/weeklyallowance', 'weeklyAllowance')->name('get.weekly.allowance');
        Route::get('/weeklyspending', 'weeklySpending')->name('get.weekly.spending');
        Route::get('/weeklysaving', 'weeklySaving')->name('get.weekly.saving');

    });

    // In routes/web.php
    Route::get('/get-all-incomes', [IncomeController::class, 'getAllIncomes'])->name('get.all.incomes');


    Route::get('/get-user-expenses/{category}', [SummaryController::class, 'categoryExpenses'])
        ->name('get.user.expenses');

    Route::get('/chart-data/last7days', [SummaryController::class, 'getLast7DaysData']);
    Route::get('/chart-data/today', [SummaryController::class, 'getTodayData']);
    Route::get('/chart-data/yesterday', [SummaryController::class, 'getYesterdayData']);
    Route::get('/chart-data/last30days', [SummaryController::class, 'getLast30DaysData']);
    Route::get('/chart-data/last1year', [SummaryController::class, 'getLast1YearData']);

    Route::post('/upload-profile-picture', [ProfileController::class, 'uploadProfilePicture'])->name('upload.profile.picture');

});

Route::controller(AuthManager::class)->group(function () {

    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/registration', 'registrationPost')->name('registration.post'); // Correct method name
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/verify/{token}', 'verifyPost')->name('verify');

});


