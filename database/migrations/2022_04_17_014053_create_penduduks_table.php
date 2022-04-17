<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->string('nik')->primary();
            $table->string('no_kk')->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('status_perkawinan',['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'])->nullable();
            $table->enum('pendidikan',[
                'Tidak/Belum Sekolah', 
                'Tidak Tamat SD/Sederajat', 
                'Tamat SD/Sederajat', 
                'SLTP/Sederajat',
                'SLTA/Sederajat',
                'Diploma I/II',
                'Akademi/Diploma III/Sarjana Muda',
                'Diploma IV/Strata I',
                'Strata II',
                'Strata III'
            ])->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
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
        Schema::dropIfExists('penduduk');
    }
}
