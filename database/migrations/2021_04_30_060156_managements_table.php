<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
//            $table->string('title',255)->nullable();
//            $table->string('leader',255)->nullable();
//            $table->string('reception',255)->nullable();
//            $table->text('content')->nullable();
//            $table->text('activity')->nullable();
//            $table->text('biography')->nullable();
            $table->string('leader_image',255)->nullable();
            $table->string('organization_image',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
//            $table->string('address',255)->nullable();
            $table->string('fax',255)->nullable();
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
        Schema::dropIfExists('managements');
    }
}
