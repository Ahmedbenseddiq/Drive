<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'price',
        'availability',
        'registration_number',
        'model_id',
        'category_id',
        'operator_id',
    ];

    public function carDetail()
    {
        return $this->belongsTo(CarDetail::class);
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
