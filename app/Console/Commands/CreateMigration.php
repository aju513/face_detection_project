<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:table {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates migration table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = "create_" . $this->argument("name") . "_table";      
        $path = "/database/migrations";
        if (file_exists(base_path() . $path)) {
            $this->call("make:migration", ["name" => $name, "--path" => $path]);
        } else {
            $this->error("Error on creating table");
        };
    }
}
