<?php

namespace App\Model\Ntrust;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustPermissionTrait;

class Permission extends Model
{
    //
    use NtrustPermissionTrait;

    protected static $roleProfile = 'user';
}
