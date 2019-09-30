<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'max_seats_allowed', 'BOK_status', 'EPS_status', 'cash_status', 'terms','cancel_condition',
    ];
}
