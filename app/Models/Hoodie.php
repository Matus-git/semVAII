<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoodie extends Model
{
    use HasFactory;
    protected $table = 'hoodies';
    protected $fillable =[
        'name',
        'description',
        'color',
        'size',
    ];
}
