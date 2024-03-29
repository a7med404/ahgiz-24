<?php

namespace Modules\User\Entities;

use Laratrust\LaratrustPermission;

class Permission extends LaratrustPermission
{
  protected $fillable = [
      'name', 'display_name', 'description',
  ];
}