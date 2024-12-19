<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'short_description',
        'long_description'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
