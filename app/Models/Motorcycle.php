<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'model', 
        'brand', 
        'price', 
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\Owner::class);
    }
}
