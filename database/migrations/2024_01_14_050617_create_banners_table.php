<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('title or name of the banner');
            $table->string('image')->comment('path to the banner image file');
            $table->string('link')->nullable()->comment('redirect when clicked');
            $table->integer('type')->default(0);
            $table->date('start_date')->nullable()->comment('The date when the banner becomes active');
            $table->date('end_date')->nullable()->comment('The date when the banner expires or is no longer displayed');
            $table->smallInteger('status')->nullable()->default(1);
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
        Schema::dropIfExists('banners');
    }
}
