<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs',function (Blueprint $table){
            $table->id();
            $table->string('table_name',255)->nullable();
            $table->unsignedInteger('row_id')->nullable();
            $table->string('option')->nullable();
            $table->text('before_values')->nullable();
            $table->text('after_values')->nullable();
            $table->string('user_ip',255)->nullable();
            $table->text('browser_agent')->nullable();
            $table->string('created_at',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
