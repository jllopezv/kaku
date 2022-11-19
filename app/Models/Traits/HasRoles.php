<?php

namespace App\Models\Traits;

use App\Models\Auth\Role;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * Trait to management roles
 */
trait HasRoles
{

    /*******************************************/
    /* Relationships
    /*******************************************/

    public function roles()
    {
        return $this->belongsToMany(Role::class)->active();
    }

    /*********************************************/
    /* Methods
    /*********************************************/

    public function getMainRoleAttribute()
    {
        return $this->roles()->orderBy('level','asc')->first();
    }

    public function getDashboardAttribute()
    {
        return $this->mainRole->dashboard;
    }

    public function assignRole(String $role) : self
    {
        $model = Role::where('role', $role)->first();        
        if ( $model!=null && $this->roles()->where('role_id', $model->id)->first()==null) $this->roles()->attach($model->id);
        $this->recalcLevel();
        return $this;
    }

    public function assignRoles(Array $roles) : self
    {
        foreach($roles as $role)
        {
            $this->assignRole($role);
        }
        return $this;   
    }

    public function revokeRole(String $role) : self
    {
        $model = Role::where('role', $role)->first();        
        if ( $model!=null && $this->roles()->where('role_id', $model->id)->first()!=null) $this->roles()->detach($model->id);
        return $this;
    }

    public function revokeRoles(Array $roles) : self
    {
        foreach($roles as $role)
        {
            $this->revokeRole($role);
        }
        return $this;
    }

    public function recalcLevel()
    {
        $this->level = $this->roles()->min('level');
    }

    

}