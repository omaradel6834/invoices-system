<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $failable = [
        'name',
        'image',
        'vedio',
        'description',
    ];
    use HasFactory;
}
