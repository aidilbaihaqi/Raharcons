<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_project',
        'item',
        'kuantitas',
        'unit',
        'harga',
        'jenis',
        'source',
    ];
}
