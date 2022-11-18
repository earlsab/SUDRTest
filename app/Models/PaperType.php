<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperType extends Model
{
    use HasFactory;

    protected $primaryKey = 'PaperTypeID';

    protected $fillable = [
        'PaperTypeName',
    ];
}
