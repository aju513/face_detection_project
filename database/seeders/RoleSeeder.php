<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Teacher',
            'guard_name' => 'web',
            'created_at' => now(),

        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Student',
            'guard_name' => 'web',
            'created_at' => now(),
        ]);
    }
}
