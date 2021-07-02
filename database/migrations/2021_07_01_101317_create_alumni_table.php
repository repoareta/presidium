<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->string('nama');
            $table->string('ttl')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp',20)->nullable();
            $table->string('email')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('perusahaan')->nullable();
            $table->timestamps();

            $table->foreign('kelas_id')->on('kelas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni');
    }
}
