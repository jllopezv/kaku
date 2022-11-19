<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use App\Models\Auth\PermissionGroup;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PermissionGroup::create([
            'group'     =>  'ESPECIALES',
            'priority'  =>  1
        ]);

        PermissionGroup::create([
            'group'     =>  'AUTENTICACIÓN',
            'priority'  =>  2
        ]);

        PermissionGroup::create([
            'group'     =>  'ACADÉMICA',
            'priority'  =>  3
        ]);

        PermissionGroup::create([
            'group'     =>  'CRM',
            'priority'  =>  4
        ]);

        PermissionGroup::create([
            'group'     =>  'CONFIGURACIÓN',
            'priority'  =>  5
        ]);

        PermissionGroup::create([
            'group'     =>  'WEBSITE',
            'priority'  =>  6
        ]);

        PermissionGroup::create([
            'group'     =>  'AUXILIARES',
            'priority'  =>  10
        ]);

        PermissionGroup::create([
            'group'     =>  'CONDOS',
            'priority'  =>  11
        ]);

        PermissionGroup::create([
            'group'     =>  'SIPRED',
            'priority'  =>  12
        ]);
    }
}
