<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carDetail extends Model
{
    use HasFactory; 

    protected $table = 'carDetails';

    protected $fillable = [
        'brand',
        'model',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
