<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->mediumText('question')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('language_id')->default('az');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id')->default(0);
            $table->mediumText('answer')->nullable();
            $table->timestamps();
        });

        Schema::create('question_histories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->timestamps();
        });
        Schema::create('question_history_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id')->default(0);
            $table->integer('answer_id')->default(0);
            $table->integer('question_history_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
