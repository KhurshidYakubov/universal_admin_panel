<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('category_id')->nullable();
           $table->unsignedBigInteger('parent_id')->nullable();
//           $table->string('title',255)->nullable();
           $table->string('image')->nullable();
           $table->string('link',255)->nullable();
           $table->unsignedInteger('link_type')->nullable();
           $table->unsignedInteger('order')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
