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
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('organisor');
            $table->tinyInteger('status');
            $table->longText('content');
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->integer('challenge_goal');
            $table->text('reward');
            $table->timestamps();

            $table->foreign('organisor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('challenges', function (Blueprint $table){
            $table->dropForeign('challenges_organisor_foreign');
        });
        Schema::dropIfExists('challenges');
    }
};
