<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $table = 'album';
    protected $fillable = ['albumId','namaAlbum','descripsi','tanggaldibuat','userId'];
    public function Foto(){
        return $this->hasMany(foto::class,'albumId','albumId');
    }
    public function User(){
        return $this->hasOne(User::class,'userid','userId');
    }
    use HasFactory;
}
