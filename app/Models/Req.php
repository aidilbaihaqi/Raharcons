<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_project',
        'categories',
        'lokasi',
        'luas_area',
        'dana',
        'time_plan',
        'image',
        'more_desc'
    ];
}
