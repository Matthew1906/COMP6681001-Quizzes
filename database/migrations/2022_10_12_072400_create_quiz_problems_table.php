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
        Schema::create('quiz_problems', function (Blueprint $table) {
            $table->integer("index");
            $table->foreignId("quiz_id")->references("id")->on("quizzes")->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['index', 'quiz_id']);
            $table->string("image")->nullable();
            $table->integer('problem_id');
            $table->string('problem_type');
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
        Schema::dropIfExists('quiz_problems');
    }
};
