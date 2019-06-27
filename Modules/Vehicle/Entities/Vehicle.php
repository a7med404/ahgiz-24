<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Vehicle\Entities\Route;
use Modules\Company\Entities\Company;

class Vehicle extends Model
{
    protected $fillable = ['name', 'description', 'seats_number', 'company_id'];
    public function company()
    {
        return $this->belongsTo(Company::Class);
    }

}
