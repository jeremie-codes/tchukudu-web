<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Auth extends Model
{

    // protected $table = 'tb_auths';

    protected $fillable = [
        'active', 'code', 'created_at', 'modified_at', 'password', 'token', 'username', 'merchant_id'
    ];

    public function tokens(): HasMany
    {
        return $this->hasMany(AuthToken::class, 'auth_id');
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'auth_id');
    }
}
