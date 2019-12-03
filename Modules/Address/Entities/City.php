<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'parent_id'];
}
