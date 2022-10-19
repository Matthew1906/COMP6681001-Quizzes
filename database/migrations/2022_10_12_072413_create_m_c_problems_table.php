<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_problems', function (Blueprint $table) {
            $table->id('index');
            $table->unsignedBigInteger('quiz_id');
            $table->primary(["quiz_id","index"]);
            $table->string('question');
            $table->string('answer');
            $table->string('choice1');
            $table->string('choice2');
            $table->string('choice3');
            $table->string('choice4');
            $table->foreign("quiz_id")->references("id")->on("quizzes")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('m_c_problems');
    }
};
