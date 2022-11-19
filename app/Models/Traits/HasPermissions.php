<?php

namespace App\Models\Traits;

use App\Models\Auth\Permission;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * Trait to management permissions
 */
trait HasPermissions
{

    /*******************************************/
    /* Relationships 
    /*******************************************/

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /*********************************************/
    /* Methods
    /*********************************************/

    public function assignPermission(String $permission) : self
    {
        $model = Permission::where('permission', $permission)->first();
        if ( $model!=null && $this->permissions()->where('permission_id', $model->id)->first()==null) $this->permissions()->attach($model->id);
        return $this;
    }

    public function assignPermissions(Array $permissions) : self
    {
        foreach($permissions as $permission)
        {
            $this->assignPermission($permission);
        }
        return $this;   
    }

    public function revokePermission(String $permission) : self
    {
        $model = Permission::where('permission', $permission)->first();
        if ( $model!=null && $this->permissions()->where('permission_id', $model->id)->first()!=null) $this->permissions()->detach($model->id);
        return $this;
    }

    public function revokePermissions(Array $permissions) : self
    {
        foreach($permissions as $permission)
        {
            $this->revokePermission($permission);
        }
        return $this;
    }


}