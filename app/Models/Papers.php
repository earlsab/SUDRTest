<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'papertype',
        'file',
    ];

}
