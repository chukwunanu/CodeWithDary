<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{
    use HasFactory;
    
    protected $table = 'car_models';
    protected $primaryKey = 'id';

    public function car() :BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
