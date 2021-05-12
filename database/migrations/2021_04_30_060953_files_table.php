<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table){
            $table->id();
            $table->string('filename',255)->nullable();
            $table->string('type',255)->nullable();
            $table->text('url')->nullable();
            $table->text('alt')->nullable();
            $table->string('size',255)->nullable();
            $table->text('description')->nullable();
            $table->text('thumbs')->nullable();
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
        Schema::dropIfExists('files');
    }
}
