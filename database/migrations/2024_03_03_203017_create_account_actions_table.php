<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_actions', function (Blueprint $table) {
            $table->id();
            $table->string('cAccName')->unique();
            $table->string('count')->comment("Đếm số lần vi phạm, >2 check khoá tài khoản");
            $table->integer('status')->nullable()->default(0)->comment("0- không cảnh báo, 1- cảnh báo");
            $table->tinyInteger('action')->nullable()->default(0)->comment("số lần cảnh báo > 3, ngưng cảnh báo");
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
        Schema::dropIfExists('account_actions');
    }
}
