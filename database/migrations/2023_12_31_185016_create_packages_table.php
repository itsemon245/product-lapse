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
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('name');
            $table->float('price');
            $table->float('monthly_rate')->nullable();
            $table->float('annual_rate');
            $table->enum('subscription_type', ['Free', 'Basic', 'Golden', 'Diamond']);
            $table->longText('features'); //when UI is ready then change this data type JSON
            $table->dateTime('product_limit');
            $table->dateTime('validity');
            $table->longText('has_limited_features'); //when UI is ready then change this data type JSON
            $table->integer('is_popular');
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
