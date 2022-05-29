<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkDomisiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_domisili', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('alamat_asal');
            $table->string('alamat_domisili');
            $table->string('jenis_domisili');
            $table->date('tanggal_berlaku');
            $table->string('nama_usaha');
            $table->string('bidang_usaha');
            $table->date('mulai_usaha');
            $table->unsignedBigInteger('berkas_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('approved_by');
            $table->timestamps();

            $table->foreign('created_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('approved_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sk_domisili');
    }
}
