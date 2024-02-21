<?php

use App\Enums\OrderStatusEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('subscriber_id')->nullable();
            $table->foreign('subscriber_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('payment_method')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->bigInteger('discount')->default(0);
            $table->longText('token')->nullable();
            $table->enum('status', array_column(OrderStatusEnum::cases(), 'value'))->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
