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
        Schema::create('user_task_lists', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('task_name');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['todo', 'in_progress', 'completed'])->default('todo');
            $table->softDeletes();
            $table->timestamps();

            // Define foreign key constraint for connect user_id column to id column of user_data_tabel
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_task_lists');
    }
};
