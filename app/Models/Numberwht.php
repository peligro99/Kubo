<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Numberwht extends Model
{
    use HasFactory;
    protected $table = 'numeroswth';
    protected $fillable = [
        'number',
        'status'
    ];
    
}
