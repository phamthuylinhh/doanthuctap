<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayCategory extends Model
{
    use HasFactory;
    protected $table = "holiday_categories";
    protected $guarded = [];
}
