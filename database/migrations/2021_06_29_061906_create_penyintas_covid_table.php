<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyintasCovidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyintas_covid', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->tinyText('jenkel');
            $table->string('goldar', 100)->nullable();
            $table->string('rhesus')->nullable();
            $table->date('sembuh')->nullable();
            $table->string('kota', 100);
            $table->boolean('donor_plasma')->nullable()->default(false);
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
        Schema::dropIfExists('penyintas_covid');
    }
}
