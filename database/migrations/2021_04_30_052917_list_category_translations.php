<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListCategoryTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_category_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('list_category_id');
            $table->unique(['list_category_id', 'locale']);

            // Actual fields you want to translate
            $table->string('title', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_category_translations');
    }
}
