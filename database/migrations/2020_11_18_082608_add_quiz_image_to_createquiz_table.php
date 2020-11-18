<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuizImageToCreatequizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('createquiz', function (Blueprint $table) {
            //
            $table->string('quiz_image')->after('quiz_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('createquiz', function (Blueprint $table) {
            //
            $table->dropcolumn('quiz_image');
        });
    }
}
