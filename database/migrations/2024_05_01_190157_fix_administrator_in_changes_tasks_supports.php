<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $tableNames = ['changes', 'supports', 'tasks'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->tableNames as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn('administrator');
            });
            Schema::table($tableName, function (Blueprint $table) {
                $table->unsignedBigInteger('administrator')->nullable();
                $table->foreign('administrator')->references('id')->on('users')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->tableNames as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropForeign(['administrator']);
                $table->dropColumn('administrator');
            });
            Schema::table($tableName, function (Blueprint $table) {
                $table->string('administrator');
            });
        }
    }
};
