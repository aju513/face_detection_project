<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class GenerateSettings extends Command
{
    protected $signature = "generate:setting";

    protected $description = "Seeds the settings table";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $confirm = $this->confirm("Are you sure you want to reset setting ?");
        if ($confirm) {
            Setting::truncate();
            $settings = config("settings");
            foreach ($settings as $setting) {
                Setting::updateOrCreate(['name' => $setting['name']], $setting);
                $this->info("Created ". $setting['display_name']);
            }
        }
    }
}
