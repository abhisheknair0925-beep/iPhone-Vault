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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('iphone_models')->onDelete('cascade');
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade');
            $table->string('color');
            $table->string('storage'); // e.g. "128GB", "256GB"
            $table->integer('battery_health'); // 80% to 100%
            $table->string('condition_grade'); // Excellent, Very Good, Good
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('status')->default('Available'); // Available, Sold
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
