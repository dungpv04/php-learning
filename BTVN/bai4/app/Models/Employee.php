<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    use HasFactory;
    protected $table = "employees";
    protected $primary_key = "id";
    protected $fillable = ["email", "phone", "name", "address"];
    public $timestamps = false;
    
}
