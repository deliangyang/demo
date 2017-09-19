<?php

namespace App\Console\Commands;

use App\Model\Ntrust\Role;
use Illuminate\Console\Command;

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
        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'front user';
        $user->description = 'front user role';
        $user->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'admin user';
        $admin->description = 'admin user role';
        $admin->save();
    }
}
