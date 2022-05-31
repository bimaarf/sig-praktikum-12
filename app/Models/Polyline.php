<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polyline extends Model
{
    use HasFactory;
    protected $table = 'polyline';
    protected $fillable =
    [
        'coordinate'
        
    ];
}
