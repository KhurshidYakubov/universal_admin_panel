<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
//            $table->string('title',255)->nullable();
            $table->string('slug',255)->nullable();
//            $table->text('short_description')->nullable();
//            $table->text('description')->nullable();
//            $table->text('body')->nullable();
            $table->string('anons_image')->nullable();
            $table->string('body_image')->nullable();
            $table->string('utube_code', 255)->nullable();
            $table->string('video', 255)->nullable();
            $table->unsignedInteger('media_type')->nullable();
            $table->string('link', 255)->nullable();
            $table->unsignedInteger('link_type')->nullable();
            $table->unsignedInteger('main_page')->nullable();
            $table->unsignedInteger('right_menu')->nullable();
            $table->string('date', 255)->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->unsignedInteger('count_view')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('modifier_id')->nullable();
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
        Schema::dropIfExists('lists');
    }
}
