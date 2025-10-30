<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
     protected $fillable = ['name', 'email'];

    public function car()
    {
        return $this->hasOne(Car::class);
    }
}
