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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('idadm');
            $table->text('googlecode');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('logo');
            $table->string('alamat');
            $table->string('telp');
            $table->string('telp2');
            $table->string('email');
            $table->text('metatag');
            $table->text('footer');
            $table->text('fb');
            $table->text('twitter');
            $table->string('google');
            $table->string('youtube');
            $table->text('linked');
            $table->text('metadesc');
            $table->text('metakey');
            $table->string('maps');
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
        Schema::dropIfExists('settings');
    }
};
