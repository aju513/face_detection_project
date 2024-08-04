<?php

namespace App\Console\Commands;

use App\Models\Menu;
use Illuminate\Console\Command;

class GenerateMenu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the sidemenu for admin';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $confirm = $this->confirm("Are you sure you want to reset menu ?");
        if ($confirm) {
            Menu::truncate();
            $menus = config("menus");           
            if($menus){
                foreach ($menus as $menu)
                {
                    $menu['parent_id'] = 0;
                    if(isset($menu['parent'])){
                        $parent_menu = Menu::where('name',$menu['parent'])->first();
                        $menu['parent_id'] = $parent_menu->id;
                    }
                    $this->info("Creating menu " . $menu['display_name']);
                    unset($menu['parent']);                    
                    Menu::updateOrCreate($menu);
                }
            }
        }
    }
}
