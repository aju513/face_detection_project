<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the model with other codes';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $model = $this->ask('What is the name of the model ?');
        $this->createModel($model);

        $view = $this->ask('What is the name of view folder ?');
        $this->createView($view);

        $migration_yn = $this->confirm("Do you want to create migration table ?");
        if ($migration_yn) {
            $migration = $this->ask('What is the name of the migration table ?');
            $this->createMigration($migration);
        }

        $repository = $this->confirm("Do you want to create repository ?");
        if ($repository) {
            $this->createRepository($model);
        }

        $ui = $this->confirm("Do you want to create ui ?");
        if ($ui) {
            $this->createUI($model);
        }

        $controller = $this->confirm("Do you want to create controller ?");
        if ($controller) {
            $this->createController($model, $view);
        }
    }

    public function createModel($model)
    {
        $template = file_get_contents(base_path() . '/app/Stubs/Model.stub');
        $variables = [
            'MODEL' => $model
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Models';
        file_put_contents($path . "/$model.php", $template);
        $this->info('Created Model ' . $model);
    }

    public function createView($view)
    {
        $view_path = base_path() . '/resources/views/admin/' . $view;
        if (file_exists($view_path)) {
            $this->warn('File already exists !!! ,Skipping this step ');
        } else {
            mkdir($view_path);
            if ($view_path) {
                touch($view_path . "/form.blade.php");
            }
            $this->info('Created View Folder ' . $view);
        }
    }

    public function createMigration($table_name)
    {
        $name = "create_" . $table_name . "_table";
        $path = "/database/migrations";
        if (file_exists(base_path() . $path)) {
            $this->call("make:migration", ["name" => $name]);
        } else {
            $this->error("Error on creating table");
        };
    }

    public function createRepository($model)
    {
        $template = file_get_contents(base_path() . '/app/Stubs/Repository.stub');
        $variables = [
            'MODEL' => $model
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Repositories/Admin';
        file_put_contents($path . "/$model" . "Repository.php", $template);
    }

    public function createUI($model)
    {
        $template = file_get_contents(base_path() . '/app/Stubs/UI.stub');
        $variables = [
            'MODEL' => $model
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/UI';
        file_put_contents($path . "/$model" . "UI.php", $template);
    }

    public function createController($model, $view)
    {

        $template = file_get_contents(base_path() . '/app/Stubs/Controller.stub');
        $variables = [
            'MODEL' => $model,
            'VIEW' => $view,
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Http/Controllers/Admin';
        file_put_contents($path . "/$model" . "Controller.php", $template);
    }
}
