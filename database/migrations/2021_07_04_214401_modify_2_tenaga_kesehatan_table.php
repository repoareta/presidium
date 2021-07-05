<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\Type;
class Modify2TenagaKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenaga_kesehatan', function (Blueprint $table) {
            if (!Type::hasType('char')) {
                Type::addType('char', StringType::class);
            }
            $table->char('district_id', 7)->nullable()->change();
            $table->char('village_id', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenaga_kesehatan', function (Blueprint $table) {
            //
        });
    }
}
