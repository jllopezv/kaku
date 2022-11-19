<?php

namespace App\Models\Auth;

use Illuminate\Support\Str;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\IsAuditable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Permission extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'group_id'
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    /**
     * Get Permission Group
     *
     * @return void
     */
    public function group()
    {
        return $this->belongsTo(PermissionGroup::class,'group_id','id','permission_groups');
    }

    /**
     * Get Role
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    /**
     * Interact with the user's address.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function permission(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => mb_strtolower($value),
            set: fn ($value) => mb_strtolower($value)
        );
    }

    public function getTableAttribute()
    {
        return Str::before($this->permission,'.');
    }

    /*******************************************/
    /* Methods
    /*******************************************/

    public function setGroup(String $group)
    {
        $model = PermissionGroup::where('group', $group)->first();
        if ($model != null) $this->group_id = $model->id;
        return $this;
    }

    public function assignRole(String $role) : self
    {
        $model = Role::where('role', $role)->first();        
        if ( $model!=null && $this->roles()->where('role_id', $model->id)->first()==null) $this->roles()->attach($model->id);
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

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('slug', 'like', '%'.$search.'%' )
            ->orWhere('name', 'like', '%'.$search.'%' )
            ->orWhere('description', 'like', '%'.$search.'%' );
    }

    
}
