<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*--------------------|List Types--------------------*/
        Schema::table('list_types', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('list_type_translations', function (Blueprint $table) {
            $table->foreign('list_type_id')->references('id')->on('list_types')->onDelete('cascade')->onDelete('CASCADE');
        });
        /*--------------------List Types|--------------------*/


        /*--------------------|List Categories--------------------*/
        Schema::table('list_categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('list_categories')->onDelete('set null');
            $table->foreign('type_id')->references('id')->on('list_types')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('list_category_translations', function (Blueprint $table) {
            $table->foreign('list_category_id')->references('id')->on('list_categories')->onDelete('CASCADE');
        });
        /*--------------------List Categories|--------------------*/


        /*--------------------|Lists--------------------*/
        Schema::table('lists', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('list_categories')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('list_translations', function (Blueprint $table) {
            $table->foreign('lists_id')->references('id')->on('lists')->onDelete('CASCADE');
        });
        /*--------------------Lists|--------------------*/


        /*--------------------|Menu--------------------*/
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('menu_categories')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('menu_category_translations', function (Blueprint $table) {
            $table->foreign('menu_category_id')->references('id')->on('menu_categories')->onDelete('CASCADE');
        });

        Schema::table('menu_translations', function (Blueprint $table) {
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('CASCADE');
        });
        /*--------------------Menu|--------------------*/


        Schema::table('appeals', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });


        /*--------------------|Management Categories--------------------*/
        Schema::table('manage_cats', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('manage_cat_translations', function (Blueprint $table) {
            $table->foreign('management_category_id')->references('id')->on('manage_cats')->onDelete('CASCADE');
        });
        /*--------------------Management Categories|--------------------*/


        /*--------------------|Managements--------------------*/
        Schema::table('managements', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('manage_cats')->onDelete('set null');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modifier_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('management_translations', function (Blueprint $table) {
            $table->foreign('management_id')->references('id')->on('managements')->onDelete('CASCADE');
        });
        /*--------------------Managements|--------------------*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*--------------------|List Types--------------------*/
        Schema::table('list_types', function (Blueprint $table) {
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('list_type_translations', function (Blueprint $table) {
            $table->dropForeign('list_type_id');
        });
        /*--------------------List Types|--------------------*/


        /*--------------------|List Categories--------------------*/
        Schema::table('list_categories', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropForeign('type_id');
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('list_category_translations', function (Blueprint $table) {
            $table->dropForeign('list_category_id');
        });
        /*--------------------List Categories|--------------------*/


        /*--------------------|Lists--------------------*/
        Schema::table('lists', function (Blueprint $table) {
            $table->dropForeign('category_id');
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('list_translations', function (Blueprint $table) {
            $table->dropForeign('list_id');
        });
        /*--------------------Lists|--------------------*/


        /*--------------------|Menu--------------------*/
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropForeign('category_id');
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('menu_category_translations', function (Blueprint $table) {
            $table->dropForeign('menu_category_id');
        });

        Schema::table('menu_translations', function (Blueprint $table) {
            $table->dropForeign('menu_id');
        });
        /*--------------------Menu|--------------------*/


        Schema::table('appeals', function (Blueprint $table) {
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });


        /*--------------------|Management Categories--------------------*/
        Schema::table('manage_cats', function (Blueprint $table) {
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('manage_cat_translations', function (Blueprint $table) {
            $table->dropForeign('management_category_id');
        });
        /*--------------------Management Categories|--------------------*/


        /*--------------------|Managements--------------------*/
        Schema::table('managements', function (Blueprint $table) {
            $table->dropForeign('category_id');
            $table->dropForeign('creator_id');
            $table->dropForeign('modifier_id');
        });

        Schema::table('management_translations', function (Blueprint $table) {
            $table->dropForeign('management_id');
        });
        /*--------------------Managements|--------------------*/
    }
}
