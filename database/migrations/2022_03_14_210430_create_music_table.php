<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nome');
            $table->text('autor');
            $table->text('link');
            $table->string('imagem');
        });
    }

    public function down()
    {
        Schema::dropIfExists('music');
    }
};
