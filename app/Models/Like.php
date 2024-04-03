<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like_foto';
    protected $primaryKey = 'likeid';
    use HasFactory;

    protected $fillable = [
        'userId', 'fotoId', 'tanggalLike'
    ];
    public function Foto()
    {
        return  $this->belongsTo(foto::class, 'fotoId', 'fotoId');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'userId', 'usedId');
    }
}
