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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->hasCreatorAndOwner();
            $table->string('name');
            $table->string('items');
            $table->string('link');
            $table->string('username');
            $table->string('password');
            $table->unsignedBigInteger('administrator')->nullable();
            $table->foreign('administrator')->references('id')->on('users')->cascadeOnDelete();
            $table->boolean('is_agreed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
