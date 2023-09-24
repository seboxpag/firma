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
        Schema::create('stanowisko', function (Blueprint $table) {
            $table->id();
            $table->string('stanowisko');
            $table->string('chemia');
            $table->string('halas');
            $table->string('inne');
            $table->integer('id_dzialu');
            $table->integer('poziom_dostepu');
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
        Schema::dropIfExists('stanowisko');
    }
};
