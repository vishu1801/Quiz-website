<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('quiz_id')->length(10)->unsigned();
            $table->foreign('quiz_id')->references('id')->on('createquiz')->onDelete('cascade');
            $table->string('question');
            $table->string('option-I');
            $table->string('option-II');
            $table->string('option-III');
            $table->string('option-IV');
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
        $table->dropForeign('lists_quiz_id_foreign');
        $table->dropIndex('lists_quiz_id_index');
        $table->dropIndex('quiz_id');
        $table->dropIndex('question');
        $table->dropColumn('option-I');
        $table->dropColumn('option-II');
        $table->dropColumn('option-III');
        $table->dropColumn('option-IV');
    }
}
