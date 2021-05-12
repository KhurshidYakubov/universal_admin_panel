<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManagementTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('management_id');
            $table->unique(['management_id', 'locale']);

            // Actual fields you want to translate
            $table->string('title',255)->nullable();
            $table->string('leader',255)->nullable();
            $table->string('reception',255)->nullable();
            $table->text('content')->nullable();
            $table->text('activity')->nullable();
            $table->text('biography')->nullable();
            $table->string('address',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_translations');
    }
}
