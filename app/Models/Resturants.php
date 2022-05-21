<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturants extends Model
{
    protected $fillable = [
        'resturant_name',
        'address',
        'opening_time',
        'closing_time',
        'resturant_belong_to',
        'image',
        'is_closed',
        'opening_date',
        'closing_date'
    ];
    use HasFactory;
}
