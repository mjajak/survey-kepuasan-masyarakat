<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriPendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_pendidikan');
    }
}
