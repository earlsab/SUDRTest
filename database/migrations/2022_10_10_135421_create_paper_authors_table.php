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
        Schema::create('paper_authors', function (Blueprint $table) {
            $table->id('PaperAuthorID');
            $table->unsignedBigInteger('paper_ID');
            $table->foreign('paper_ID')->references('PaperID')->on('papers');
            $table->string('AuthorName');
            $table->unsignedBigInteger('user_ID');
            $table->foreign('user_ID')->references('UserID')->on('users');
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
        Schema::dropIfExists('paper_authors');
    }
};
