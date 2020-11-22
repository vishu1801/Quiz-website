<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('quiz_id')->length(10)->unsigned();
            $table->foreign('quiz_id')->references('id')->on('createquiz')->onDelete('cascade');
            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('lives');
        $table->dropForeign('lists_quiz_id_foreign');
        $table->dropIndex('lists_quiz_id_index');
        $table->dropcolumn('quiz_id');
        $table->dropForeign('lists_user_id_foreign');
        $table->dropIndex('lists_user_id_index');
        $table->dropColumn('user_id');
    }
}
