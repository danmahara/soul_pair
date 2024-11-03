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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Define the user_id column
            $table->unsignedBigInteger('liked_user_id'); // Define the liked_user_id column
            $table->timestamps();
            $table->softDeletes(); // Soft deletes column

            // Add foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('liked_user_id')->references('id')->on('users')->onDelete('cascade');

            // Ensure a user can't like the same person multiple times
            $table->unique(['user_id', 'liked_user_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
