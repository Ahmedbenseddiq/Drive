<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carDetail extends Model
{
    use HasFactory; 

    protected $table = 'models';

    protected $fillable = [
        'brand',
        'logo',
        'model',
    ];

    public function carDetail()
    {
        return $this->hasMany(carDetail::class);
    }
}
