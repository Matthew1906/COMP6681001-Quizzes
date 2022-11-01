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
        Schema::create('fill_problems', function (Blueprint $table) {
            $table->integer('index');
            $table->binary("image");
            $table->unsignedBigInteger('quiz_id');
            $table->primary(["quiz_id","index"]);
            $table->string('question', 500);
            $table->string('answer');
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
        Schema::dropIfExists('fill_problems');
    }
};
