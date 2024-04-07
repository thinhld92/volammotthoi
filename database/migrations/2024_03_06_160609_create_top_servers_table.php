<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_servers', function (Blueprint $table) {
            $table->id();
            $table->string('cAccName');
            $table->string('gamename')->nullable();
            $table->integer('level')->nullable()->default(0);
            $table->bigInteger('exp')->nullable();
            $table->bigInteger('expnext')->nullable();
            $table->string("ip")->nullable();
            $table->string("logtime")->nullable();
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
        Schema::dropIfExists('top_servers');
    }
}
