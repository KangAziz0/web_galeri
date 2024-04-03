<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $table = 'foto';
    protected $fillable = ['judulfoto','deskripsifoto','tanggalunggah','lokasiFile','albumId','userId'];
    public function Album(){
        return $this->hasOne(album::class,'albumId','albumId');
    }
    public function user(){
        return $this->belongsTo(user::class,'userId','userid');
    }
    public function like(){
        return $this->hasMany(Like::class,'fotoId','fotoId');
    }
    public function komentar(){
        return $this->hasMany(komentar::class,'fotoId','fotoId');
    }
    use HasFactory;
}