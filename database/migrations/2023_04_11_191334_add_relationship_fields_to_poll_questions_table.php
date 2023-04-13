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
        Schema::table('poll_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('poll_id')->nullable();
            $table->foreign('poll_id', 'poll_fk_8314243')->references('id')->on('polls');

            $table->unsignedBigInteger('poll_question_type_id')->nullable();
            $table->foreign('poll_question_type_id', 'poll_question_type_fk_8319127')->references('id')->on('poll_question_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poll_questions', function (Blueprint $table) {
            $table->dropForeign('poll_id');
            $table->dropColumn('poll_id');
        });
    }
};
