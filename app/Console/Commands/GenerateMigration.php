<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Migration';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $confirmMigrations = $this->confirm("Are you sure you want to run migrations");
        $freshMigrations = $this->confirm("Do you want to run fresh migrations. Default is No.", false);

        if ($confirmMigrations) {
            $command = $freshMigrations ? "migrate:fresh" : "migrate";
            $this->info("Running Migrations");
            $path = "/database/migrations";
            $this->call($command, ['--path' => $path]);
            $command = "migrate";
        }
    }
}
