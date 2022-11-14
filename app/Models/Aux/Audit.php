<?php

namespace App\Models\Aux;

use Illuminate\Database\Eloquent\Model;


class Audit extends Model
{

    /*******************************************/
    /* Properties
    /*******************************************/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action', 'ip', 'old', 'new', 'tablename'
    ];

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    /*******************************************/
    /* Relationships
    /*******************************************/

    public function auditable()
    {
        return $this->morphTo();
    }

    /*********************************************/
    /* Methods
    /*********************************************/

    public function getActionTag($size='text-sm')
    {
        switch($this->action)
        {
            case 'create':
                return "<span class='px-2 font-bold ".$size." text-white bg-blue-400 rounded-md'>".strtoupper($this->action)."</span>";
            case 'update':
                return "<span class='px-2 font-bold ".$size." text-white bg-green-400 rounded-md'>".strtoupper($this->action)."</span>";
            case 'delete':
                return "<span class='px-2 font-bold ".$size." text-white bg-red-400 rounded-md'>".strtoupper($this->action)."</span>";
        }

    }


    /*********************************************/
    /* Scopes
    /*********************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('action', 'like', '%'.$search.'%' );
    }


    /*******************************************/
    /* Static Methods
    /*******************************************/


}
