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
        Schema::create('pickup_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pickup_request_id')->constrained('pickup_requests')->onDelete('cascade');
        $table->foreignId('waste_category_id')->constrained('waste_categories');
        $table->enum('size', ['S', 'M', 'L', 'XL']);
        $table->decimal('estimated_weight', 8, 2);
        $table->boolean('is_wet')->default(false);
        $table->boolean('has_smell')->default(false);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickup_items');
    }
};
