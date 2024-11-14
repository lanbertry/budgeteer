<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget', function (Blueprint $table) {
            $table->id('budget_id');
            $table->foreignId('user_id')->constrained('users');
            $table->string('type');
            $table->string('category');
            $table->decimal('amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget');
    }
};
