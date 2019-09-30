<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable = ['name','parent_id'];
}
