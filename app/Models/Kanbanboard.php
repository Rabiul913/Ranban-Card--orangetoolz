<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanbanboard extends Model
{
    use HasFactory;

    protected $table = 'kanbanboards';
    protected $fillable = [
        'content', 'status',
    ];
}
