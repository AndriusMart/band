<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dishImage extends Model
{
    use HasFactory;
    protected $fillable = ['dish_id', 'url'];
}

