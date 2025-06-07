<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    
//    protected $table = 'tb_messages';

    protected $table = 'messages';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'closed', 'content', 'created_at', 'delivered', 'modified_at',
        'nb_trial_check', 'notification', 'phone_number', 'reference', 'response',
        'sent', 'sms_from', 'sms_login', 'auth_id', 'merchant_id'
    ];

    public function auth(): BelongsTo
    {
        return $this->belongsTo(Auth::class, 'auth_id');
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
