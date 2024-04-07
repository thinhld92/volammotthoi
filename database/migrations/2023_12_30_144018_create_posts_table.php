<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description');
            $table->text('content');
            $table->string('thumbnail');
            $table->string('image');
            $table->string('image_caption')->nullable();
            $table->string('source')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('views_count')->unsigned()->nullable()->default(0)->index();
            $table->timestamp('published_at')->default(now());
            $table->date('hot_date');
            $table->date('new_date');
            $table->date('banner_date')->nullable();
            $table->date('event_date')->nullable();
            $table->smallInteger('status')->nullable()->default(1);
            $table->string('seo_alias')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_meta_keywords')->nullable();
            $table->string('seo_meta_description')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
