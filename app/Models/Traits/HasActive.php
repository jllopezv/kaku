<?php

namespace App\Models\Traits;

/**
 * Trait to management active field in tables
 */
trait HasActive
{

    /*********************************************/
    /* Properties
    /*********************************************/

    public $hasactive=true;

    /*********************************************/
    /* Methods
    /*********************************************/

    /*********************************************/
    /* Scopes
    /*********************************************/

    /**
     * Query to active in model
     *
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeNonActive($query)
    {
        return $query->where('active', 0);
    }

}
