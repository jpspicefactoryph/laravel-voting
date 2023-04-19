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
        Schema::create('poll_assigneds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('poll_id')->nullable();
            $table->foreign('poll_id', 'poll_fk_8314244')->references('id')->on('polls');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8314630')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poll_assigneds');
    }
};
