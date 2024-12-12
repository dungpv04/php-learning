<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'grade_level',
        'room_number',
    ];
}
