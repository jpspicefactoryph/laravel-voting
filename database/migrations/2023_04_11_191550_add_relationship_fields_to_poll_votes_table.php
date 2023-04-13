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
        Schema::table('poll_votes', function (Blueprint $table) {
            $table->unsignedBigInteger('poll_id')->nullable();
            $table->foreign('poll_id', 'poll_fk_8314626')->references('id')->on('polls');
            
            $table->unsignedBigInteger('poll_question_id')->nullable();
            $table->foreign('poll_question_id', 'poll_question_fk_8314627')->references('id')->on('poll_questions');
            
            $table->unsignedBigInteger('poll_answer_id')->nullable();
            $table->foreign('poll_answer_id', 'poll_answer_fk_8314628')->references('id')->on('poll_answers');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8314629')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poll_votes', function (Blueprint $table) {
            $table->dropForeign('poll_id');
            $table->dropColumn('poll_id');

            $table->dropForeign('poll_question_id');
            $table->dropColumn('poll_question_id');

            $table->dropForeign('poll_answer_id');
            $table->dropColumn('poll_answer_id');

            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
    }
};
