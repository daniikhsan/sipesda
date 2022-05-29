<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSuratToSkDomisiliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sk_domisili', function (Blueprint $table) {
            $table->enum('status',['Diajukan', 'Diproses', 'Perbaikan', 'Selesai','Dibatalkan']);
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sk_domisili', function (Blueprint $table) {
            //
        });
    }
}
