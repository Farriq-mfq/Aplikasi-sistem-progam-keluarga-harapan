<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $table = 'alternative';
    protected $fillable = ['user_id','NIK','name','address','gender','foto'];
    public function nilai()
    {
        return $this->hasMany(\App\Models\AlternativeValue::class);
    }
    public function crip()
    {
        return $this->belongsToMany(\App\AlternativeValue::class, 'alternative_value', 'alternative_id', 'criteria_id');
    }
}
