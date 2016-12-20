<?php

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->boolean('visible')->default(true);
            $table->text('position')->nullable()->default(null);
            $table->boolean('show_media')->default(true)->comment('Дали да показва медиата в прегледа на страницата'); //Дали да показва медиата в прегледа на страницата
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('pages_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pages_id')->unsigned();
            $table->string('title');
            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->string('slug');
            $table->longText('description')->nullable()->default(null);
            $table->string('locale')->index();

            $table->unique([
                'pages_id',
                'locale',
            ]);

            $table->unique([
                'pages_id',
                'slug',
            ]);

            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('pages');
        Schema::drop('pages_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
