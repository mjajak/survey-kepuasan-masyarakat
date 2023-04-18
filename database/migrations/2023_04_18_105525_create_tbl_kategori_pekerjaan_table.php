<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKategoriPekerjaanTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_kategori_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_kategori_pekerjaan');
    }
}
