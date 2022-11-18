<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaperAuthor extends Model
{
    use HasFactory;

    protected $primaryKey = 'PaperAuthorID';

    protected $fillable = [
        'AuthorName',
    ];
}
