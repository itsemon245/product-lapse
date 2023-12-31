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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->float('price');
            $table->float('monthly_rate');
            $table->float('annual_rate');
            $table->enum('subscription_type', ['Free', 'Basic', 'Golden', 'Diamond']);
            $table->json('features');
            $table->dateTime('product_limit');
            $table->dateTime('validity');
            $table->string('has_limited_features');
            $table->enum('is_popular', ['popular', 'best', 'priority']);
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
