<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\Permission;
use Illuminate\Database\Seeder;
use App\Models\Auth\PermissionGroup;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table='permissions';
        $this->createPermissions($table,'AUTENTICACIÓN');

        $table='permission_groups';
        $this->createPermissions($table,'AUTENTICACIÓN');

        $table='users';
        $this->createPermissions($table,'AUTENTICACIÓN');

        $table='roles';
        $this->createPermissions($table,'AUTENTICACIÓN');

        /* AUX */

        $table='audits';
        $this->createPermissions($table,'AUXILIARES');

        $table='colors';
        $this->createPermissions($table,'AUXILIARES');

        $table='countries';
        $this->createPermissions($table,'AUXILIARES');

        $table='timezones';
        $this->createPermissions($table,'AUXILIARES');

        $table='languages';
        $this->createPermissions($table,'AUXILIARES');

        /* CONDOS */

        $table='condos';
        $this->createPermissions($table,'CONDOS');

        $table='condobuildings';
        $this->createPermissions($table,'CONDOS');

        $table='condoproperties';
        $this->createPermissions($table,'CONDOS');


        /* SIPRED */

        $table='schools';
        $this->createPermissions($table,'SIPRED');


    }

    public function createPermissions($table, $group)
    {
        Permission::create([
            'name'          =>  "ACCEDER A LOS REGISTROS",
            'permission'    =>  $table.'.access',
            'description'   =>  "PERMITE ACCEDER A LOS REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "LISTAR REGISTROS",
            'permission'    =>  $table.'.index',
            'description'   =>  "PERMITE LISTAR LOS REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "LISTAR REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.index.others',
            'description'   =>  "PERMITE LISTAR LOS REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "CREAR REGISTROS",
            'permission'    =>  $table.'.create',
            'description'   =>  "CREAR REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "ELIMINAR REGISTROS",
            'permission'    =>  $table.'.destroy',
            'description'   =>  "ELIMINAR REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "ELIMINAR REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.destroy.others',
            'description'   =>  "ELIMINAR REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "VER REGISTROS",
            'permission'    =>  $table.'.show',
            'description'   =>  "PERMITE VER REGISTROS LOS REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "VER REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.show.others',
            'description'   =>  "VER REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "EDITAR REGISTROS",
            'permission'    =>  $table.'.edit',
            'description'   =>  "PUEDE EDITAR REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "EDITAR REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.edit.others',
            'description'   =>  "EDITAR REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "BLOQUEAR REGISTROS",
            'permission'    =>  $table.'.lock',
            'description'   =>  "PUEDE BLOQUEAR REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "BLOQUEAR REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.lock.others',
            'description'   =>  "BLOQUEAR REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "IMPRIMIR REGISTROS",
            'permission'    =>  $table.'.print',
            'description'   =>  "PUEDE IMPRIMIR REGISTROS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

        Permission::create([
            'name'          =>  "IMPRIMIR REGISTROS DE OTROS USUARIOS",
            'permission'    =>  $table.'.print.others',
            'description'   =>  "IMPRIMIR REGISTROS DE OTROS USUARIOS",
            'group_id'         =>  $this->getGroupID($group),
        ]);

    }

    public function getGroupID($group)
    {
        $groupid=PermissionGroup::where('group',$group)->first();
        return $groupid?->id;
    }
}
