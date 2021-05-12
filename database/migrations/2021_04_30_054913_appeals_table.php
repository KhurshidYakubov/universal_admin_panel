<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table){
            $table->id();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->string('middle_name',255)->nullable();
            $table->unsignedInteger('gender')->nullable();
            $table->string('organization',255)->nullable();
            $table->unsignedInteger('region_id')->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('address',255)->nullable();
            $table->string('title',255)->nullable();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->string('file',255)->nullable();
            $table->unsignedInteger('code')->nullable();
            $table->string('appeal_code',255)->nullable();
            $table->string('user_ip',255)->nullable();
            $table->text('browser_agent')->nullable();
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
        Schema::dropIfExists('appeals');
    }
}
