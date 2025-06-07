<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AuthToken extends Model
{

    // protected $table = 'tb_auth_tokens';

    protected $fillable = [
        'active', 'code', 'created_at', 'expires_at', 'modified_at', 'token', 'auth_id'
    ];

    public function auth(): BelongsTo
    {
        return $this->belongsTo(Auth::class, 'auth_id');
    }
}
