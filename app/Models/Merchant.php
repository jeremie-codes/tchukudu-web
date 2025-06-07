<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Merchant extends Model
{

    // protected $table = 'tb_merchants';

    protected $fillable = [
        'active', 'code', 'created_at', 'modified_at', 'name', 'own_config', 'sms_from', 'sms_login'
    ];

    public function auths(): HasMany
    {
        return $this->hasMany(Auth::class, 'merchant_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'merchant_id');
    }
}
