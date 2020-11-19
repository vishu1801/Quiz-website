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
            $table->string('option_I');
            $table->string('option_II');
            $table->string('option_III');
            $table->string('option_IV');
            $table->string('answer');
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
        $table->dropcolumn('quiz_id');
        $table->dropcolumn('question');
        $table->dropColumn('option_I');
        $table->dropColumn('option_II');
        $table->dropColumn('option_III');
        $table->dropColumn('option_IV');
        $table->dropColumn('answer');
    }
}
