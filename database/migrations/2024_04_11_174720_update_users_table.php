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
        Schema::table('users', function(Blueprint $table){
            $table->dropUnique('users_email_unique');
            $table->string('email')->nullable()->unique()->change();
            $table->unsignedBigInteger('main_account_id')->nullable();
            $table->foreign('main_account_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropUnique('users_email_unique');
            $table->string('email')->unique()->change();
            $table->dropForeign(['main_account_id']);
            $table->dropColumn('main_account_id');
        });
    }
};
