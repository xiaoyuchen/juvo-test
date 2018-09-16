<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->timestamps();
            $table->string('title');
            $table->text('url');
            $table->text('thumbnailUrl');
            $table->integer('albumId')->unsigned()->index()->nullable();
            
            $table->integer('album_id')->unsigned()->index()->nullable();
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
