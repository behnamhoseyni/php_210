<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update01TableSliderFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slider', function (Blueprint $table) {
            //
            $table->string('slider_title');
            $table->text('slider_description');
            $table->string('slider_link');
            $table->string('slider_button_lable');
            $table->string('slider_off_image');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slider', function (Blueprint $table) {
            //
            $table->dropColumn('slider_title');
            $table->dropColumn('slider_description');
            $table->dropColumn('slider_link');
            $table->dropColumn('slider_button_lable');
            $table->dropColumn('slider_off_image');

        });
    }
}
