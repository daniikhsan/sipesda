<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Penduduk extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    protected $table = 'penduduk';

    public function user(){
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}
