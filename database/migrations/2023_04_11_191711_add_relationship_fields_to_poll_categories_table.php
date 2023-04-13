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
        Schema::table('poll_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('poll_id')->nullable();
            $table->foreign('poll_id', 'poll_fk_8314645')->references('id')->on('polls');
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_8314646')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poll_categories', function (Blueprint $table) {
            $table->dropForeign('poll_id');
            $table->dropColumn('poll_id');

            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
    }
};
