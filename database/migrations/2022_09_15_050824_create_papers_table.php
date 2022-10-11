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
        Schema::create('papers', function (Blueprint $table) {
            $table->id('PaperID');
            $table->string('PaperTitle');
            $table->string('PaperType');
            $table->string('College');
            $table->string('file');
            $table->date('DateUploaded');
            $table->date('DatePublished');
            $table->date('DateLastModified');
            $table->unsignedBigInteger('UploaderUserID')->unsigned();
            $table->timestamps();
        });

        Schema::table('papers', function (Blueprint $table){
            $table->foreign('UploaderUserID')->references('UserID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
};
