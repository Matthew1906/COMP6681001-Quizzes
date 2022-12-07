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
        Schema::create('quiz_classes', function (Blueprint $table) {
            $table->foreignId("class_id")->references("id")->on("class_groups")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("quiz_id")->references("id")->on("quizzes")->onUpdate("cascade")->onDelete("cascade");
            $table->primary(['class_id', 'quiz_id']);
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
        Schema::dropIfExists('quiz_classes');
    }
};
