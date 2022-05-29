<?php

namespace App\Models\SuratKeterangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Berkas;

class Domisili extends Model
{
    use HasFactory;

    protected $table = 'sk_domisili';
    protected $guarded = ['id'];

    public function berkas(){
        return $this->belongsTo(Berkas::class);
    }
}
