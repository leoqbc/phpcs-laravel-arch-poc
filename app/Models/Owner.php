<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name',
    ];

    public function motorcycles()
    {
        return $this->hasMany(\App\Models\Motorcycle::class);
    }
}
