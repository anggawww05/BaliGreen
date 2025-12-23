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
        Schema::create('pickup_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->enum('status', ['pending', 'assigned', 'completed', 'rejected'])->default('pending');
        $table->integer('max_risk_level')->default(0);
        $table->integer('aggregated_min_tolerance')->default(0);
        $table->decimal('total_weight_kg', 8, 2)->default(0);
        $table->string('sorting_photo_path')->nullable();
        $table->boolean('is_sorted_confirmed')->default(false);
        $table->text('notes')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_requests');
    }
};
