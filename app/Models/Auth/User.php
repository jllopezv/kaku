<?php

namespace App\Models\Auth;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Models\Aux\Country;
use Illuminate\Support\Str;
use App\Models\Aux\Language;
use App\Models\Aux\Timezone;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasOwner;
    use HasActive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'level', 
        'password',
        'dateformat', 
        'timezone_id', 
        'country_id', 
        'language_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be dates.
     *
     * @var array
     */
    protected $dates = [
        'lastlogin',
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    /**
     * Get Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->active();
    }

    public function getUserLevel()
    {
        return $this->belongsToMany(Role::class)->active()->select('roles.level')->pluck('level')->min();
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get With profile is
     */
    public function profile()
    {
        return $this->morphTo();
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    protected function username(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => mb_strtolower($value),
            set: fn ($value) => mb_strtolower($value),
        );
    }

    public function getMainRoleAttribute()
    {
        return $this->roles()->orderBy('level','asc')->first();
    }

    public function getDashboardAttribute()
    {
        return $this->mainRole->dashboard;
    }

    public function getLastActivityAttribute()
    {
        return Cache::get('user-is-online-' . $this->id);
    }

    /*********************************************/
    /* Methods
    /*********************************************/

    public function getSessionRole()
    {
        foreach($this->roles as $role)
        {
            if (Hash::check($role->id, session('role_id'))) return $role;
        }
    }

    public function getRolesTags()
    {
        $tag='';
        foreach($this->roles as $role)
        {
            $tag.=$role->getRoleTagAttribute()." ";
        }
        return $tag;
    }

    public function getRolesNeutralTags()
    {
        $tag='';
        foreach($this->roles as $role)
        {
            $tag.=$role->getRoleNeutralTagAttribute()." ";
        }
        return $tag;
    }

    public function isAdmin()
    {
        if ($this->level<=config('lopsoft.maxLevelAdmin')) return true;
        return false;
    }

    public function isSuperadmin()
    {
        if ($this->level==1) return true;
        return false;
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function setLastLogin()
    {
        $this->lastlogin=Carbon::now();
        $this->save();
    }


    /**
     * Check if user has ability. If $slug is an array then AND logic
     *
     * @param  String|Array $slug
     * @return boolean
     */
    public function hasAbility($slug)
    {
        if ($this->level==1) return true;    // Superuser always has this ability

        $roles=$this->roles;
        if (!is_array($slug))
        {
            foreach($roles as $role)
            {
                if ($role->hasAbility($slug)) return true; // At least one role has slug
            }
            return false;
        }

        // Array slug. Only true if user has ALL permissions ( can be in diferent roles )

        foreach($slug as $permissionslug)
        {
            if (!$this->hasAbility($permissionslug)) return false;
        }
        return true;

    }

    public function hasAbilityOr($slug)
    {
        if ($this->level==1) return true;    // Superuser always has this ability

        $roles=$this->roles;
        if (!is_array($slug))
        {
            foreach($roles as $role)
            {
                if ($role->hasAbility($slug)) return true; // At least one role has slug
            }
            return false;
        }

        // Array slug. Only true if user has al least one permission ( can be in diferent roles )

        foreach($slug as $permissionslug)
        {
            if ($this->hasAbility($permissionslug)) return true;
        }
        return false;
    }

    /**
     * Get the name of the mayor role ( level role )
     *
     * @return String
     */
    public function getUserRole()
    {
        $role=Role::where('level',$this->level)->first();
        return($role->role??"");
    }


    public function recalcLevel()
    {
        $this->level=$this->getUserLevel()??50000;
        $this->save();
    }

    /**
     * Assign role to user
     *
     * @param string|array $roles
     * @return void
     */
    public function assignRole( String|Array $roles )
    {
        if (!is_array($roles))
        {
            $role=Role::where( 'role','=',$roles )->active()->first();
            if ( $role!=null) $this->roles()->attach($role->id);
        }
        else
        {
            foreach($roles as $item)
            {
                $role=Role::where( 'role','=',$item )->active()->first();
                if ( $role!=null) $this->roles()->attach($role->id);
            }
        }
        $this->level=$this->getUserLevel();
        $this->save();
    }

    /**
     * Assign role to user
     *
     * @param string|array $roles
     * @return void
     */
    public function removeRole( String|Array $roles )
    {
        if (!is_array($roles))
        {
            $role=Role::where( 'role','=',$roles )->active()->first();
            if ( $role!=null) $this->roles()->detach($role->id);
        }
        else
        {
            foreach($roles as $item)
            {
                $role=Role::where( 'role','=',$item )->where('active',1)->first();
                if ( $role!=null) $this->roles()->detach($role->id);
            }
        }
        $this->level=$this->getUserLevel();
        $this->save();
    }

    /*********************************************/
    /* Scopes
    /*********************************************/

    /**
     * Query to search in model
     *
     * @param  mixed $query
     * @param  mixed $search
     * @return void
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%' )
            ->orWhere('username', 'like', '%'.$search.'%' )
            ->orWhere('email', 'like', '%'.$search.'%' );
    }

    /*******************************************/
    /* Rules
    /*******************************************/


    /*******************************************/
    /* Static Methods
    /*******************************************/
    
}