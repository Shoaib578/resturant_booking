<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'date',
        'time',
        'how_many_peoples',
        'ordered_by',
        'description',
        'is_completed',
        'order_resturant_id',
        'resturant_owner',
        'is_closed',

    ];
    use HasFactory;
}
