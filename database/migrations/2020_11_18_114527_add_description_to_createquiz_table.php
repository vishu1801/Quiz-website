<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToCreatequizTable extends Migration
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
            $table->string('quiz_description')->after('quiz_image');
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
            $table->dropcolumn('quiz_description');
        });
    }
}
