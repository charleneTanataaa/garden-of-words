<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Letter extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'color'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
