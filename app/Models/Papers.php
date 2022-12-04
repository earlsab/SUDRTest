<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    protected $primaryKey = 'PaperID';

    protected $fillable = [
        'UploaderUserID',
        'PaperTitle',
        'PaperType',
        'College',
        'file',
        'DateCompleted',
        'ContentAdviser',
        'modified_by',
    ];

}