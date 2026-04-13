<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'license_plate',
        'mileage',
        'lat',
        'lng',
        'is_premium',
        'renta_count',
        'daily_rate',
        'status',
    ];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
