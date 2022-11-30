<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    use HasFactory;

    protected $table =  'relations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'author_ID',
        'paper_ID',
    ];
}
