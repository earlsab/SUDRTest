<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    use HasFactory;

    protected $primaryKey = 'PaperID';

    protected $fillable = [
        'PaperTitle',
        'PaperType',
        'College',
        'file',
        'DateCompleted',
        'Content_Adviser',
    ];

}
