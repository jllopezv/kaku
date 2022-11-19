<?php

namespace App\Models\Auth;

use Carbon\Carbon;
use App\Models\Aux\Country;
use App\Models\Aux\Language;
use App\Models\Aux\Timezone;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasRoles;
use App\Models\Traits\HasActive;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\HasPermissions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasOwner;
    use HasActive;
    use HasRoles;
    use HasPermissions;

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

    public function profile()
    {
        return $this->morphTo();
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    public function getLastActivityAttribute()
    {
        return Cache::get('user-is-online-'.$this->id);
    }

    /*********************************************/
    /* Methods
    /*********************************************/

    

    public function isAdmin() : bool
    {
        if ($this->level<=config('lopsoft.maxLevelAdmin')) return true;
        return false;
    }

    public function isSuperadmin() : bool
    {
        if ($this->level==1) return true;
        return false;
    }

    public function isOnline() : bool
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function setLastLogin() : void
    {
        $this->lastlogin=Carbon::now();
        $this->save();
    }

    public function hasAbility($slug)
    {
        if ($this->isSuperadmin()) return true;
        $permission=$this->permissions()->where('slug',$slug)->first();
        return $permission?true:false;
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