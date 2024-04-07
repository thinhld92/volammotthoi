<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAccountHabitusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_account_habituses', function (Blueprint $table) {
            $table->id();
            $table->string("cAccName");
            $table->integer("playerindex")->nullable()->default(0);
            $table->string("gamename")->nullable();
            $table->integer("coin")->nullable()->default(0);
            $table->integer("coinchange")->nullable();
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
        Schema::dropIfExists('log_account_habituses');
    }
}
