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
            $table->string('ContentAdviser');
            $table->string('College')->nullable();
            $table->string('file');
            $table->date('DateCompleted')->nullable();
            $table->unsignedBigInteger('UploaderUserID');
            $table->foreign('UploaderUserID')->references('UserID')->on('users');
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
        Schema::dropIfExists('papers');
    }
};
