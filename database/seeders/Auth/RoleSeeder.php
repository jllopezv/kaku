<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\Role;
use App\Models\Auth\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'role'              =>  'SUPERADMIN',
            'level'             =>  1,
            'dashboard'         =>  'superadmin',
            'description'       =>  'Super administrador',
            'quota'             =>  0,
            'unlimited_quota'   =>  true,
            'color_id'          =>  2,
        ]);

        $admin = Role::create([
            'role'              =>  'ADMIN',
            'level'             =>  5,
            'dashboard'         =>  'admin',
            'description'       =>  'Administrador',
            'quota'             =>  config('lopsoft.default_quota'),
            'unlimited_quota'   =>  false,
            'color_id'          =>  2,
        ]);
        
        $this->addPermissions($admin, 'permissions');
        $this->addPermissions($admin, 'permission_groups');
        $this->addPermissions($admin, 'users');
        $this->addPermissions($admin, 'roles');
        $this->addPermissions($admin, 'colors');
        $this->addPermissions($admin, 'countries');
        $this->addPermissions($admin, 'timezones');
        $this->addPermissions($admin, 'languages');



    }


    public function addPermissions($role, $table, $access=true, $index=true, $create=true, $view=true, $viewall=true, $edit=true, $editall=true, $delete=true, $deleteall=true, $lock=true, $lockall=true, $print=true, $printall=true )
    {
        if ($access) $role->setPermission($table.'.access');
        if ($index) $role->setPermission($table.'.index');
        if ($create) $role->setPermission($table.'.create');
        if ($view) $role->setPermission($table.'.show');
        if ($viewall) $role->setPermission($table.'.show.others');
        if ($edit) $role->setPermission($table.'.edit');
        if ($editall) $role->setPermission($table.'.edit.others');
        if ($delete) $role->setPermission($table.'.destroy');
        if ($deleteall) $role->setPermission($table.'.destroy.others');
        if ($print) $role->setPermission($table.'.print');
        if ($printall) $role->setPermission($table.'.print.others');
        if ($lock) $role->setPermission($table.'.lock');
        if ($lockall) $role->setPermission($table.'.lock.others');
    }
}
