<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->integer('price');
            $table->integer('validity')->nullable();
            $table->enum('unit', ['month', 'year', 'day'])->nullable();
            $table->integer('product_limit')->nullable();
            $table->boolean('is_popular')->default(1);
            $table->boolean('limited_feature')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
