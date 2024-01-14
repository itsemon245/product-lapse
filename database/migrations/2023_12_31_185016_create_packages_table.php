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
            $table->integer('price');
            $table->integer('monthly_rate')->nullable();
            $table->integer('annual_rate');
            $table->string('subscription_type');
            $table->longText('features'); //when UI is ready then change this data type JSON
            $table->dateTime('product_limit');
            $table->dateTime('validity');
            $table->longText('has_limited_features'); //when UI is ready then change this data type JSON
            $table->string('is_popular')->nullable();
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
