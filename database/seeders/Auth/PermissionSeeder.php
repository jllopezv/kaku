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
        $record=new Permission;
        $record->name="ACCEDER A LOS REGISTROS";
        $record->slug=$table.'.access';
        $record->description="PERMITE ACCEDER A LOS REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="LISTAR REGISTROS";
        $record->slug=$table.'.index';
        $record->description="PERMITE LISTAR LOS REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="LISTAR REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.index.others';
        $record->description="PERMITE LISTAR LOS REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="CREAR REGISTROS";
        $record->slug=$table.'.create';
        $record->description="CREAR REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="ELIMINAR REGISTROS";
        $record->slug=$table.'.destroy';
        $record->description="ELIMINAR REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="ELIMINAR REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.destroy.others';
        $record->description="ELIMINAR REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="VER REGISTROS";
        $record->slug=$table.'.show';
        $record->description="PERMITE VER REGISTROS LOS REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="VER REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.show.others';
        $record->description="VER REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="EDITAR REGISTROS";
        $record->slug=$table.'.edit';
        $record->description="PUEDE EDITAR REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="EDITAR REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.edit.others';
        $record->description="EDITAR REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="BLOQUEAR REGISTROS";
        $record->slug=$table.'.lock';
        $record->description="PUEDE BLOQUEAR REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="BLOQUEAR REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.lock.others';
        $record->description="BLOQUEAR REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="IMPRIMIR REGISTROS";
        $record->slug=$table.'.print';
        $record->description="PUEDE IMPRIMIR REGISTROS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

        $record=new Permission;
        $record->name="IMPRIMIR REGISTROS DE OTROS USUARIOS";
        $record->slug=$table.'.print.others';
        $record->description="IMPRIMIR REGISTROS DE OTROS USUARIOS";
        $record->group=$this->getGroupID($group);
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                            'allowEdit'     => false,
                                            'allowDelete'   => false,
                                            'allowLock'     => false
                                        ]);*/

    }

    public function getGroupID($group)
    {
        $groupid=PermissionGroup::where('group',$group)->first();
        return $groupid->id;
    }
}
