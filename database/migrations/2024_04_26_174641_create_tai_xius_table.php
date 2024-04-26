<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiXiusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_xius', function (Blueprint $table) {
            $table->id();
            $table->integer("playerindex")->nullable()->default(0);
            $table->string("cAccName");
            $table->string("gamename")->nullable();
            $table->integer("coin")->nullable()->default(0);
            $table->integer("dice1")->nullable()->default(1);
            $table->integer("dice2")->nullable()->default(1);
            $table->integer("dice3")->nullable()->default(1);
            $table->integer("total")->nullable()->default(3);
            $table->string("result")->nullable()->default("lose");
            $table->string("datcuoc")->nullable()->default("lose");
            $table->integer("tiencuoc")->nullable()->default("lose");
            $table->integer("tienthuong")->nullable()->default("lose");
            $table->dateTime("logtime")->nullable();
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
        Schema::dropIfExists('tai_xius');
    }
}
