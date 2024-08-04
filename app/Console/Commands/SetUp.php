<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SetUp Project for first';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $env = base_path(".env");
        $env_example = base_path(".env.example");
        if (file_exists($env_example) && !file_exists($env)) {
            \File::copy($env_example, $env);
            Artisan::call('config:clear');
        }
        if (env('APP_ENV') == 'local') {

            // key
            $confirm = $this->confirm("Generate Key ?");
            if ($confirm) {
                $this->call('key:generate');
            }

            // database setup
            $confirm = $this->confirm("Do you want to setup database now ?");
            if ($confirm) {
                $this->setupDatabase();
                Artisan::call('config:clear');
            }

            $this->warn('Please check and confirm for database setup in .env file ');

            $confirm = $this->confirm("Is Database Setup OK ?");

            if ($confirm) {
                $confirm = $this->confirm("Run Migrations ?");
                if ($confirm) {
                    $this->call('generate:migration');
                }
                $confirm = $this->confirm("Generate Permissions ?");
                if ($confirm) {
                    $this->call('generate:permission');
                }
                $confirm = $this->confirm("Generate Menu ?");
                if ($confirm) {
                    $this->call('generate:menu');
                }
                $confirm = $this->confirm("Generate Setting ?");
                if ($confirm) {
                    $this->call('generate:setting');
                }
                $confirm = $this->confirm("Generate Super User ?");
                if ($confirm) {
                    $this->call('generate:super-user');
                }
                $this->call("storage:link");
            } else {
                $this->warn('Please check and confirm for database setup in .env file ');
            }
        } else {
            $this->warn("Terminating process : Sorry !!, you are in " . env('APP_ENV') . " environment");
        }
    }

    public function setupDatabase()
    {
        $confirm = $this->confirm("Ready to Setup Database ?");
        if ($confirm) {
            $config = $this->laravel['config']['database']['connections']['mysql'];
            $results = [
                'DB_DATABASE' => [
                    'config_key' => 'database',
                    'response' =>  $this->ask(" Database Name ?")
                ],
                'DB_USERNAME' => [
                    'config_key' => 'username',
                    'response' =>  $this->ask(" Database username ?")
                ],
                'DB_PASSWORD' => [
                    'config_key' => 'password',
                    'response' => $this->ask(" Database password ?")
                ],
            ];
            $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($results as $key => $result) {
                    file_put_contents($path, str_replace(
                        $key . '=' . $config[$result['config_key']],
                        $key . '=' . $result['response'],
                        file_get_contents($path)
                    ));
                }
                Artisan::call('config:clear');
            }
        }
    }
}
