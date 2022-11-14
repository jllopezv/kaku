<?php

namespace App\Models\Traits;

use App\Models\Auth\User;

/**
 *   Models with user_id references to users
 */
trait HasOwner
{

    /**
     * Boot Trait
     */
    public static function bootHasOwner()
    {
        static::creating(function($model){
            self::setCreatedBy($model);
        });

        static::updating(function($model){
            self::setUpdatedBy($model);
        });
    }

    /**
     * Set Created By
     */
    public static function setCreatedBy($model)
    {
        $model->createdByUser()->associate( auth()->user() );
    }

    /**
     * Set Updated By
     */
    public static function setUpdatedBy($model)
    {
        $model->updatedByUser()->associate( auth()->user() );
    }

    /**
     * Get created_by user
     *
     * @return void
     */
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get updated_by user
     *
     * @return void
     */
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
