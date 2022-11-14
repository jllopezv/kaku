<?php

namespace App\Models\Auth;

use App\Lopsoft\LopUtils;
use App\Models\Auth\User;
use App\Models\Aux\Color;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\IsAuditable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
        'role', 'level', 'dashboard', 'color_id', 'quota', 'quota_unit', 'unlimited_quota', 'description'
    ];

    /**
     * Control boot events
     */
    public static function boot()
    {
        parent::boot();
        static::created(function($model){
            Cache::forget('role'.$model->id.'.permissions');
            Cache::forget('roles');
        });

        static::deleted(function($model){
            Cache::forget('role'.$model->id.'.permissions');
            Cache::forget('roles');
        });

        static::updated(function($model){
            Cache::forget('role'.$model->id.'.permissions');
            Cache::forget('roles');
        });

        static::saved(function($model){
            Cache::forget('role'.$model->id.'.permissions');
            Cache::forget('roles');
        });
    }

    /*******************************************/
    /* Relationships
    /*******************************************/

    /**
     * Get Color
     *
     * @return void
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->where('active',1);
    }

    public function permissionsCached()
    {
        return Cache::remember('role'.$this->id.'.permissions', 60*60*24, function() {
            return $this->belongsToMany(Permission::class)->where('active',1)->get();
        });
    }

    /**
     * Get Array of permissions
     *
     * @return void
     */
    public function permissionsArray()
    {
        return $this->belongsToMany(Permission::class)->active()->select('permissions.id')->pluck('id')->toArray();
    }

    /**
     * Get Users
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->active();
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    /**
     * Get role in uppercase
     *
     * @param  string  $value
     * @return string
     */
    public function getRoleAttribute($value)
    {
        return mb_strtoupper($value);
    }

    /**
     * Set role in uppercase
     *
     * @param  string  $value
     * @return void
     */
    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = mb_strtoupper($value);
    }

    public function getRoleNameAttribute()
    {
        return $this->color->getCustomTag($this->role);
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

    /*******************************************/
    /* Abilities
    /*******************************************/

    public function hasAbility($slug)
    {
        if (auth()->isSuperadmin()) return true;
        $permission=$this->permissionsCached()->where('slug',$slug)->first();
        return (($permission && $this->active)?true:false);
    }

    /*******************************************/
    /* Static Methods
    /*******************************************/

    static public function getLevel($role)
    {
        $role=Role::where('role',$role)->first();
        if ($role==null) return null;
        return $role->level;
    }
    /*******************************************/
    /* Methods
    /*******************************************/

    public function getRoleName($size='text-base')
    {
        return $this->color->getCustomTag($this->role, $size);
    }

    public function getRoleTagAttribute()
    {
        return $this->color->getCustomTag($this->role);
    }

    public function getRoleNeutralTagAttribute()
    {
        return "<span class='px-2 text-base font-bold bg-slate-200 text-slate-600 rounded-lg'>$this->role</span>";
    }


    public function scopeSearch($query, $search)
    {
        return $query->where('role', 'like', '%'.$search.'%' )
            ->orWhere('dashboard', 'like', '%'.$search.'%' );
    }



}
