<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    // Userモデルとのリレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
