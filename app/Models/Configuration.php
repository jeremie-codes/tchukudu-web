<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Configuration extends Model
{

    // protected $table = 'tb_configurations';

    protected $fillable = [
        'active', 'code', 'created_at', 'modified_at', 'schedule_date_format',
        'schedule_date_value', 'sms_from', 'sms_login', 'sms_url', 'sms_url_check'
    ];
}
