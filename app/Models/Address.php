<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [

        'state',
        'post_code',
        'city',
        'street',
        'house_number'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
