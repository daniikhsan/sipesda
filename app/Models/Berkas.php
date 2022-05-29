<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SuratKeterangan\Domisili;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';

    public function domisili(){
        $this->hasOne(Domisili::class);
    }
}
