<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'criteria';
    protected $fillable = ['name','attribute','type','weight'];
    public function nilai()
    {
        return $this->hasMany(\App\Models\AlternativeValue::class);
    }
    public function crip()
    {
        return $this->hasMany(\App\Models\AlternativeValue::class);
    }
}
