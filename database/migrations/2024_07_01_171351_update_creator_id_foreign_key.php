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
        $tables = [
            'products',
            'changes',
            'deliveries',
            'tasks',
            'invitations',
            'supports',
            'documents',
            'ideas',
            'reports',
            'releases',
            'selects',
        ];
        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropForeign(['creator_id']);
            });
            Schema::table($tableName, function (Blueprint $table) {
                $table->foreign('creator_id')->references('id')->on('users')->nullOnDelete();
            });
        }

        // Main account id in users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['main_account_id']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('main_account_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
