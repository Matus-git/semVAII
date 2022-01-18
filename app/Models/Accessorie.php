<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessorie extends Model
{
    use HasFactory;
    protected $table = 'accessories';
    protected $fillable =[
        'id_product',
        'name',
        'description',
        'color',
        'size',
    ];
    public function accessories()
    {
        return $this->belongsToMany(Product::class);
    }
}
