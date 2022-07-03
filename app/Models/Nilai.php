<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai_minim';
    protected $fillable = ['nilai_minim','tanggal_keluar'];
    public $timestamps = false;
}
