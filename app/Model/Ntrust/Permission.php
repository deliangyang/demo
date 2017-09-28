<?php

namespace App\Model\Ntrust;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustPermissionTrait;

/**
 * App\Model\Ntrust\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Ntrust\Role[] $roles
 * @mixin \Eloquent
 */
class Permission extends Model
{
    //
    use NtrustPermissionTrait;

    protected static $roleProfile = 'user';
}
