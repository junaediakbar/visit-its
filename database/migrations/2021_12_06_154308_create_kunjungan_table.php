<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('admin_id')->default(0);
            $table->string('jenis_tamu');
            $table->string('nama_tamu');
            $table->string('instansi_tamu');
            $table->string('nama_kegiatan');
            $table->date('waktu_tamu');
            $table->integer('durasi_tamu');
            $table->integer('konfirmasi_tamu')->default(0);
            $table->string('file_pendukung')->nullable();
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
        Schema::dropIfExists('kunjungan');
    }
}
