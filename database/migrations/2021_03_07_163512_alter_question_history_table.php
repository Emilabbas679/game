<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterQuestionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_histories', function (Blueprint $table) {
            $table->integer('referral_id')->default(0);
            $table->integer('same_answers')->default(0);
        });
        Schema::table('question_history_answers', function (Blueprint $table) {
            $table->integer('is_same')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_history', function (Blueprint $table) {
            //
        });
    }
}
