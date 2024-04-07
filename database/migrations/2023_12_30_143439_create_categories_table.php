<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('parent_id')->nullable()->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('sort_order')->nullable()->default(0);
            $table->smallInteger('show_to_user')->nullable()->default(1);
            $table->smallInteger('show_in_menu')->nullable()->default(1);
            $table->smallInteger('show_in_home')->nullable()->default(1);
            $table->string('thumbnail')->nullable();
            $table->string('status')->nullable()->default(1);
            $table->string('seo_alias')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_meta_keywords')->nullable();
            $table->string('seo_meta_description')->nullable();
            $table->smallInteger('is_locked')->nullable()->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
}
