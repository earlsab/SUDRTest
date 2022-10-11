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
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id('BookMarkID');
            $table->unsignedBigInteger('user_ID')->unsigned();
            $table->unsignedBigInteger('paper_ID')->unsigned();
            $table->timestamps();
        });

        Schema::table('bookmarks', function (Blueprint $table){
            $table->foreign('user_ID')->references('UserID')->on('users');
            $table->foreign('paper_ID')->references('PaperID')->on('papers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
