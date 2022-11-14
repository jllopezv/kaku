<?php

namespace App\Models\Traits;


/**
 * Trait to management of current field in tables
 */
trait HasCurrent
{

    public $hascurrent=true;

    /*********************************************/
    /* Methods
    /*********************************************/

    /*********************************************/
    /* Static
    /*********************************************/

    /*********************************************/
    /* Scopes
    /*********************************************/

    /**
     * Query to active in model
     *
     */
    public function scopeCurrent($query)
    {
        return $query->where('current', 1);
    }

}
