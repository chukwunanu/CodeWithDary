<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'founded',
        'description'
    ];

    public function carModels() :HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function headquarters() :HasOne
    {
        return $this->hasOne(Headquarter::class);
    }

    //define a hasmany through relationship
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class, 
            'car_id', // foreign key on the car_models table
            'model_id'); // foreign key on the engines table
    }

    // define a hasone through relationship
    public function productionDate()
    {
        return $this->hasOneThrough(
            CarproductionDate::class,
            CarModel::class,
            'car_id', // foreign key on the car_models table
            'model_id' // foreign key on the production_dates table
        );
    }

    public function products() :BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
