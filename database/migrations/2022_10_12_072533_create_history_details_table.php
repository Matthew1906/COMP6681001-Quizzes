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
        Schema::create('history_details', function (Blueprint $table) {
            $table->unsignedBigInteger('history_id');
            $table->integer('index');
            $table->primary(["history_id","index"]);
            $table->foreign("history_id")->references("id")->on("quiz_histories")->onUpdate("cascade")->onDelete("cascade");
            $table->string("answer"); // stores the user's answer
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
        Schema::dropIfExists('history_details');
    }
};
