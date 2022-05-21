<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant_week_schedule extends Model
{
    protected $fillable = [
        "monday",
        "monday_opening_time",
        "monday_closing_time",
        "tuesday",
        "tuesday_opening_time",
        "tuesday_closing_time",

        "wednesday",
        "wednesday_opening_time",
        "wednesday_closing_time",

        "thursday",
        "thursday_opening_time",
        "thursday_closing_time",

        "friday",
        "friday_opening_time",
        "friday_closing_time",
        "saturday",
        "saturday_opening_time",
        "saturday_closing_time",
        "sunday",
        "sunday_opening_time",
        "sunday_closing_time",
        "resturant_id"
    ];
    use HasFactory;
}
