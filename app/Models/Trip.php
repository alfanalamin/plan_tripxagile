<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trip';

    protected $fillable = [
        'name',
        'description',
        'image',
        'author'
    ];

    public function writer()
    {
        return $this->belongsTo(User::class, 'author' , 'id');
    }
}

