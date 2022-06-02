<?php

namespace App\Models\SuratKeterangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Domisili extends Model
{
    use HasFactory;

    protected $table = 'sk_domisili';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','user_id'); 
    }
}
