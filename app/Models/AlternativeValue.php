<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeValue extends Model
{
    use HasFactory;
    protected $table = 'alternative_value';
    protected $fillable = ['alternative_id','criteria_id','criteria_option_id','weight','value'];
    public function alternative()
    {
        return $this->belongsTo(\App\Models\Alternative::class);    
    }
    public function criteria()
    {
        return $this->belongsTo(\App\Models\Criteria::class);    
    }
}
