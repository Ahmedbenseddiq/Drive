<?php

namespace App\Models;

use App\Models\like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'price_per_day',
        'availability',
        'registration_number',
        'carburant',
        'image',
        'carDetail_id',
        'category_id',
        'operator_id',
    ];

    public function carDetail()
    {
        return $this->belongsTo(CarDetail::class,'carDetail_id');
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }
}
