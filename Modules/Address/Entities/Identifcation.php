<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Company\Entities\Company;
use Modules\Company\Entities\Employee;

class Identifcation extends Model
{
    protected $fillable = ['type', 'identifcation_number', 'issue_date', 'issue_place','identifcationable_id', 'identifcationable_type'];

    public function company()
    {
        return $this->belongsTo(Company::Class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::Class);
    }
    
    public function identifcationable()
    {
        return $this->morphTo();
    }
}
