<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    use HasFactory;
    protected $table = 'shirts';
    protected $fillable =[
        'id_product',
        'name',
        'description',
        'color',
        'size',
    ];
    public function hoodies()
    {
        return $this->belongsToMany(Product::class);
    }
}
