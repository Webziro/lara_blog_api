<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // First add the column as nullable
            $table->foreignId('user_id')->nullable();
        });

        // Then update any existing posts to have a valid user_id
        // You can either delete them or assign them to a default user
        DB::table('posts')->update(['user_id' => 1]); // Assuming user with ID 1 exists

        // Finally add the constraint
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('user_id')
                  ->nullable(false)
                  ->change();
            
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropConstrainedForeignId('user_id'); // Or $table->dropForeign(['user_id']);
            // Then drop the column itself
            $table->dropColumn('user_id');
        });
    }
};