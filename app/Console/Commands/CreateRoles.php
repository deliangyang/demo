<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Klaravel\Ntrust\Middleware\NtrustRole;

class CreateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ext:create-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = new NtrustRole();
        $user->name = 'user';
        $user->display_name = 'front user';
        $user->description = 'front user role';
        $user->save();

        $admin = new NtrustRole();
        $admin->name = 'admin';
        $admin->display_name = 'admin user';
        $admin->description = 'admin user role';
        $admin->save();
    }
}
