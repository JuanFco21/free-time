<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\AdministratorSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdministratorSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
