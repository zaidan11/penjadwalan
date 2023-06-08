<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoassMhs2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coass_mhs2s', function (Blueprint $table) {
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
        Schema::dropIfExists('coass_mhs2s');
    }
}
