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
        Schema::create('bills', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users');
        $table->string('month_year');
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['unpaid', 'pending_verification', 'paid', 'paid_with_points'])->default('unpaid');
        $table->string('transaction_image')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
