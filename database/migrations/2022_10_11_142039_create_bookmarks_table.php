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
            $table->bigIncrements('BookMarkID');
            $table->string('BookmarkName');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('UserID')->on('users');
            $table->unsignedBigInteger('paper_id');
            $table->foreign('paper_id')->references('PaperID')->on('papers');
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
        Schema::dropIfExists('bookmarks');
    }
};
