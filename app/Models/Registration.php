<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table ="registration";
    protected $primaryKey ="id";
    protected $fillable=[
        'image',
        'TID'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
}

