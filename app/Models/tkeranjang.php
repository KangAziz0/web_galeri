<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tkeranjang extends Model
{
    protected $table = 'tkeranjang';
    protected $fillable = ['lokasiFile','keterangan','userId'];
    use HasFactory;
}
