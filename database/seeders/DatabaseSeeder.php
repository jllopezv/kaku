<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Auth\RoleSeeder;
use Database\Seeders\Auth\UserSeeder;
use Database\Seeders\Aux\ColorSeeder;
use Database\Seeders\Aux\CountrySeeder;
use Database\Seeders\Aux\CurrencySeeder;
use Database\Seeders\Aux\LanguageSeeder;
use Database\Seeders\Aux\TimezoneSeeder;
use Database\Seeders\Auth\PermissionSeeder;
use Database\Seeders\Auth\PermissionGroupSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Aux
        $this->call(ColorSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TimezoneSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(CurrencySeeder::class);

        //Auth
        $this->call(PermissionGroupSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
