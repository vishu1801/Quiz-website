<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createquiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('createquiz', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('quiz_title');
            $table->integer('code');
            $table->integer('counter');
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
        Schema::dropIfExists('createquiz');
        $table->dropForeign('lists_user_id_foreign');
        $table->dropIndex('lists_user_id_index');
        $table->dropColumn('user_id');
        $table->dropColumn('quiz_title');
        $table->dropColumn('code');
        $table->dropColumn('counter');
    }
}
