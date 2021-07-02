<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPenyintasCovidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyintas_covid', function (Blueprint $table) {
            $table->dropColumn('kota');
            $table->dropColumn('kelas');
            $table->char('province_id', 2)->after('id');
            $table->foreign('province_id')->on('provinces')->references('id')->onDelete('cascade');
            $table->char('regency_id', 4)->after('province_id');
            $table->foreign('regency_id')->on('regencies')->references('id')->onDelete('cascade');
            $table->char('district_id', 7)->after('regency_id');
            $table->foreign('district_id')->on('districts')->references('id')->onDelete('cascade');
            $table->char('village_id', 10)->after('district_id');
            $table->foreign('village_id')->on('villages')->references('id')->onDelete('cascade');
            $table->unsignedBigInteger('kelas_id')->after('village_id');
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
        Schema::table('penyintas_covid', function (Blueprint $table) {
            $table->string('kota', 100);
            $table->string('kelas', 100);
            $table->dropForeign(['province_id']);
            $table->dropForeign(['regency_id']);
            $table->dropForeign(['district_id']);
            $table->dropForeign(['village_id']);
        });
    }
}
