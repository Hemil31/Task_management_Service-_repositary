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
        Schema::table('user_task_lists', function (Blueprint $table) {
            // Drop existing enum column
            $table->unsignedTinyInteger('status')->change()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_task_lists', function (Blueprint $table) {
            // Drop tinyint column
            $table->unsignedTinyInteger('status')->change()->default(0);

        });
    }
};
