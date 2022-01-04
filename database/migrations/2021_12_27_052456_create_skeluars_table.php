<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skeluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file')->default('logoplg.jpeg');
            $table->string('nokeluar');
            $table->text('perihal');
            $table->string('dituju');   
            $table->date('tanggal');
            $table->string('ket');
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
        Schema::dropIfExists('skeluars');
    }
}
