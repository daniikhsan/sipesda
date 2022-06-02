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
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat_asal')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('jenis_domisili')->nullable();
            $table->date('tanggal_berlaku')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->date('mulai_usaha')->nullable();
            $table->string('berkas')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('approved_by')->nullable();
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
