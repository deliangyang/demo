<?php

namespace App\Model\Ntrust;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;

class Role extends Model
{

    use NtrustRoleTrait;

    //

    protected static $roleProfile = 'user';

}
