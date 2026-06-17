<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'user_id',
        'instansi',
        'rating',
        'komentar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
