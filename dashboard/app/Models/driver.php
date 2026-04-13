<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $table = 'drivers';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'user_id',
        'license_number',
        'license_img',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
