<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->tinyInteger('headlines');
            $table->tinyInteger('main');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('excrept');
            $table->string('img');
            $table->string('caption');
            $table->text('metakey');
            $table->text('metadesc');
            $table->string('date');
            $table->integer('viewer')->default(0);
            $table->string('tag');
            $table->integer('parent');
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
        Schema::dropIfExists('articles');
    }
};
