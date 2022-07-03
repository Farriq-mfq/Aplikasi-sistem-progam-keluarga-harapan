<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nilai;
class Result extends Model
{
    use HasFactory;
    protected $table = 'result';
    protected $fillable = ['alternative_id','total'];
    public function scopeLulus($query)
    {
        $nilai = Nilai::first()->nilai_minim;
        return $query->where('total','>',$nilai);
    }
}
