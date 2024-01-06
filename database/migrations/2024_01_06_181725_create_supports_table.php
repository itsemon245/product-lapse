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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('user_id')->cascadeOnDelete();
            $table->string('name');
            $table->enum('classification', ['working', 'etc']);
            $table->enum('priority', ['first', 'second']);
            $table->enum('status', ['disabled', 'etc']);
            $table->longText('description');
            $table->string('administrator');
            $table->dateTime('completion_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
