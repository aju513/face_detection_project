<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateEventListenersNotification extends Command
{
    protected $signature = "generate:eln";

    protected $description = "Creates the eln inside the packages";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $name = $this->ask('What is the name of the ELN ?');


        $event = $this->confirm("Do you want to create event ?");
        if ($event) {
            $this->createEvent($name);
        }

        $listener = $this->confirm("Do you want to create listener ?");
        if ($listener) {
            $this->createListener($name);
        }

        $notification = $this->confirm("Do you want to create notification ?");
        if ($notification) {
            $this->createNotification($name);
        }
    }

    public function createEvent($name)
    {

        $template = file_get_contents(base_path() . '/app/Stubs/event.stub');
        $variables = [
            'EVENT' => $name
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Events';
        file_put_contents($path . "/$name.php", $template);

    }

    public function createListener($name)
    {        
        $template = file_get_contents(base_path() . '/app/Stubs/listener.stub');
        $variables = [
            'LISTENER' => $name
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Listeners';
        file_put_contents($path . "/$name.php", $template);
    }

    public function createNotification($name)
    {       
        $template = file_get_contents(base_path() . '/app/Stubs/notification.stub');
        $variables = [
            'EVENT' => $name
        ];
        foreach ($variables as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        $path = base_path() . '/app/Notifications';
        file_put_contents($path . "/$name.php", $template);
    }
}
