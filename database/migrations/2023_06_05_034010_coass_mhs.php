<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoassMhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coass_mhs', function (Blueprint $table) {
            $table->int('ID');
            $table->string('NIM');
            $table->string('NAMA_MHS');
            $table->string('LP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coass_mhs', function (Blueprint $table) {
            //
        });
    }
}
