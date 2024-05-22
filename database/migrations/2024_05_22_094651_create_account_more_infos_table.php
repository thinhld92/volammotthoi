<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountMoreInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_more_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cAccName')->unique();
            $table->string('cPassWord')->nullable();
            $table->string('cSecPassword')->nullable();
            $table->string('registerIP')->nullable();
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
        Schema::dropIfExists('account_more_infos');
    }
}
