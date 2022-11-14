<?php

namespace App\Models\Aux;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    /**
     * Control boot events
     */
    public static function boot()
    {
        parent::boot();
        static::created(function($model){
            Cache::forget('timezones');
        });

        static::deleted(function($model){
            Cache::forget('timezones');
        });

        static::updated(function($model){
            Cache::forget('timezones');
        });

        static::saved(function($model){
            Cache::forget('timezones');
        });
    }

    /**
     *  Cached get function
     */
    static public function getAll()
    {
        return Cache::remember('timezones', 60*60*24, function() {
                return Timezone::all();
            });
    }

    public function scopeSearch($query, $search)
    {
        $tzs=Timezone::getAll();
        $filtered=$tzs->filter(function($value,$key) use($search)
        {
            $newsearch=str_replace(' ','_',strtolower($search));
            return (strpos( strtolower($value->name), strtolower($newsearch) ) !== false);
        })->pluck('id');

        return $query->whereIn('id',$filtered)
                ->orWhere('offset','like','%'.$search.'%');

    }

}
