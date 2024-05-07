<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTask extends Model
{
    use HasFactory;
    protected $table ="assigntask";
    protected $primaryKey ="id";

    protected $casts = [
        'team_members' => 'array',
    ];
}
