<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'komentar_foto';
    protected $primaryKey = 'komentarId';
    protected $fillable = ['tanggalKomentar','isiKomentar'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'userId','userid');
    }
    public function foto(){
        return $this->belongsTo(foto::class,'fotoId','fotoId');
    }
}
