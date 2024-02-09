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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('approved_id')->nullable();
        $table->foreign('approved_id')->references('id')->on('users')->cascadeOnDelete();
        $table->unsignedBigInteger('achieved_id');
        $table->foreign('achieved_id')->references('id')->on('users')->cascadeOnDelete();
        $table->string('name');
        $table->integer('status')->nullable();
        $table->longText('company');
        $table->dateTime('issue_date')->nullable();
        $table->longText('link');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
