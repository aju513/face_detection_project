<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GeneratePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $confirm = $this->confirm("Are you sure you want to reset permissions ?");
        if ($confirm) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');            
            Permission::truncate();
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


            foreach (config("permissions") as $permission) {
                $this->info("Creating permission $permission");

                $permission = Permission::create([
                    'name' => $permission
                ]);
            }
            $user = User::find(1);
            $role_count = Role::count();
           
            if ($role_count == 0) {
                $role = Role::create(['name' => "Administrator"]);
                foreach (config("permissions") as $permission) {
                    $role->givePermissionTo($permission);
                }
                if ($user) {
                    $user->assignRole($role);
                }
                $this->info("Created role and assigned permissions to Administrator");
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
