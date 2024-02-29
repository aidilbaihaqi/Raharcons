<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_project',
        'categories',
        'lokasi',
        'luas_area',
        'nama_mandor',
        'dana',
        'time_plan',
        'image',
        'more_desc'
    ];
}
