<?php

namespace App\Models\Auth;

use App\Lopsoft\LopUtils;
use App\Models\Auth\User;
use App\Models\Aux\Color;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\HasPermissions;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Role extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;

    /*******************************************/
    /* Properties
    /*******************************************/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 
        'description',
        'level', 
        'dashboard', 
        'color_id', 
        'quota', 
        'quota_unit', 
        'unlimited_quota', 
        
    ];

    protected $casts = [
        'unlimited_quota' => 'boolean'
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    /**
     * Interact with the user's address.
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => mb_strtoupper($value),
            set: fn ($value) => mb_strtoupper($value)
        );
    }

    public function getQuotaStringAttribute($value)
    {
        return LopUtils::formatBytes($this->totalQuota);
    }

    public function getTotalQuotaAttribute($value)
    {
        return $this->quota*$this->getMultiplicator();
    }

    public function getMultiplicator()
    {
        switch ($this->quota_unit)
        {
            case 'Kb':  return 1024;
            case 'Mb':  return 1024*1024;
            case 'Gb':  return 1024*1024*1024;
        }
        return 0;
    }

    public function hasQuota()
    {
        return !$this->unlimited_quota;
    }

    /*******************************************/
    /* Static Methods
    /*******************************************/

    /*******************************************/
    /* Methods
    /*******************************************/

    public function setPermission(String $permission) : self
    {
        $model = Permission::where('permission', $permission)->first();        
        if ( $model!=null && $this->permissions()->where('permission_id', $model->id)->first()==null) $this->permissions()->attach($model->id);
        return $this;
    }

    public function setPermissions(Array $permissions) : self
    {
        foreach($permissions as $permission)
        {
            $this->setPermission($permission);
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
            $this->setPermission($permission);
        }
        return $this;
    }

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('role', 'like', '%'.$search.'%' )
            ->orWhere('dashboard', 'like', '%'.$search.'%' );
    }

}
