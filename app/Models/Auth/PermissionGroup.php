<?php

namespace App\Models\Auth;

use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\HasPriority;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;
    use HasPriority;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group', 'priority',
    ];

    public function setGroupAttribute($value)
    {
        $this->attributes['group']=mb_strtoupper($value);
    }

    public function getGroupAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('group', 'like', '%'.$search.'%' );
    }

}
