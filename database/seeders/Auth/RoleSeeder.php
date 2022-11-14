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
        $record=new Role;
        $record->role="SUPERADMIN";
        $record->level=1;
        $record->dashboard='superadmin';
        $record->description='Super admininistrador';
        $record->unlimited_quota=true;
        $record->color_id=2;
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                             'allowEdit'     => false,
                                             'allowDelete'   => false,
                                             'allowLock'     => false
                                        ]);*/

        $record=new Role;
        $record->role="ADMIN";
        $record->level=5;
        $record->dashboard='admin';
        $record->description='Administrador';
        $record->color_id=1;
        $record->quota=10;
        $record->quota_unit='Mb';
        $record->unlimited_quota=false;
        $record->save();
        /*$record->allowedActions()->create([  'allowShow'     => false,
                                             'allowEdit'     => false,
                                             'allowDelete'   => false,
                                             'allowLock'     => false
                                        ]);*/

        $this->addPermissions($record, 'permissions');
        $this->addPermissions($record, 'permission_groups');
        $this->addPermissions($record, 'users');
        $this->addPermissions($record, 'roles');

        $this->addPermissions($record, 'colors');
        $this->addPermissions($record, 'countries');
        $this->addPermissions($record, 'timezones');
        $this->addPermissions($record, 'languages');


        $record=new Role;
        $record->role="USER";
        $record->level=1000;
        $record->dashboard='user';
        $record->description='Usuario';
        $record->color_id=4;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();

        $record=new Role;
        $record->role="USER2";
        $record->level=1002;
        $record->dashboard='user';
        $record->description='Usuario';
        $record->color_id=5;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();

        $record=new Role;
        $record->role="USER3";
        $record->level=1003;
        $record->dashboard='user';
        $record->description='Usuario';
        $record->color_id=6;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();

        $record=new Role;
        $record->role="USER4";
        $record->level=1004;
        $record->dashboard='user';
        $record->description='Usuario';
        $record->color_id=7;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();

        $record=new Role;
        $record->role="CONDOADMIN";
        $record->level=2004;
        $record->dashboard='condoadmin';
        $record->description='Administracion de Condos';
        $record->color_id=8;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();
        $this->addPermissions($record, 'condoproperties');
        $this->addPermissions($record, 'condobuildings');

        $record=new Role;
        $record->role="CONDOOWNER";
        $record->level=2005;
        $record->dashboard='condoowner';
        $record->description='Propietario de Propiedades';
        $record->color_id=9;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();
        $this->addPermissions($record, 'condoproperties');
        $this->addPermissions($record, 'condobuildings');

        $record=new Role;
        $record->role="CONDOTENANT";
        $record->level=2006;
        $record->dashboard='condotenant';
        $record->description='Inquilino de Propiedades';
        $record->color_id=9;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();
        $this->addPermissions($record, 'condoproperties');
        $this->addPermissions($record, 'condobuildings');

        /* SIPRED */
        $record=new Role;
        $record->role="SIPREDUSER";
        $record->level=80001;
        $record->dashboard='sipreduser';
        $record->description='Usuario SIPRED';
        $record->color_id=2;
        $record->quota=100;
        $record->quota_unit='Kb';
        $record->unlimited_quota=false;
        $record->save();
        $this->addPermissions($record, 'schools');

    }


    public function addPermissions($record, $table, $access=true, $index=true, $create=true, $view=true, $viewall=true, $edit=true, $editall=true, $delete=true, $deleteall=true, $lock=true, $lockall=true, $print=true, $printall=true )
    {
        $parray=[];
        if ($access) $parray[]=( Permission::where('slug',$table.".access")->first() )->id;
        if ($index) $parray[]=( Permission::where('slug',$table.".index")->first() )->id;
        if ($create) $parray[]=( Permission::where('slug',$table.".create")->first() )->id;
        if ($view) $parray[]=( Permission::where('slug',$table.".show")->first() )->id;
        if ($viewall) $parray[]=( Permission::where('slug',$table.".show.others")->first() )->id;
        if ($edit) $parray[]=( Permission::where('slug',$table.".edit")->first() )->id;
        if ($editall) $parray[]=( Permission::where('slug',$table.".edit.others")->first() )->id;
        if ($delete) $parray[]=( Permission::where('slug',$table.".destroy")->first() )->id;
        if ($deleteall) $parray[]=( Permission::where('slug',$table.".destroy.others")->first() )->id;
        if ($print) $parray[]=( Permission::where('slug',$table.".print")->first() )->id;
        if ($printall) $parray[]=( Permission::where('slug',$table.".print.others")->first() )->id;
        if ($lock) $parray[]=( Permission::where('slug',$table.".lock")->first() )->id;
        if ($lockall) $parray[]=( Permission::where('slug',$table.".lock.others")->first() )->id;
        $record->permissions()->attach($parray);


    }
}
