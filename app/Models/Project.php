<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table ="project";
    protected $primaryKey ="PID";

    // public function getPStartDateAttribute($v)
    // {
    //     return date("d-M-Y", strtotime($v));
    // }
    
    // public function getPEndDateAttribute($v)
    // {
    //     return date("d-M-Y", strtotime($v));
    // }


}
