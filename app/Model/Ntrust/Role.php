<?php

namespace App\Model\Ntrust;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;

/**
 * App\Model\Ntrust\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Ntrust\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @mixin \Eloquent
 */
class Role extends Model
{

    use NtrustRoleTrait;

    //

    protected static $roleProfile = 'user';

}
