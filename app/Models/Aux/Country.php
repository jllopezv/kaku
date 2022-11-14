<?php

namespace App\Models\Aux;

use App\Models\Traits\HasOwner;
use App\Models\Traits\IsAuditable;
use App\Models\Traits\HasTranslation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use HasTranslation;
    use HasOwner;
    use IsAuditable;

    /**
     * Fields with translation
     *
     * @var array
     */
    protected $translatable = [ 'country' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country', 'nicename', 'iso', 'iso3', 'numcode', 'phonecode', 'language'
    ];

    protected $appends=[ 'flag' ];

    /**
     * Control boot events
     */
    public static function boot()
    {
        parent::boot();
        static::created(function($model){
            Cache::forget('countries');
        });

        static::deleted(function($model){
            Cache::forget('countries');
        });

        static::updated(function($model){
            Cache::forget('countries');
        });

        static::saved(function($model){
            Cache::forget('countries');
        });
    }

    /**
     *  Cached function
     */
    static public function getAll()
    {
        // 30 days, 1 month
        return Cache::remember('countries', 60*60*24*30, function() {
                return Country::with('translations')->get();
            });
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = mb_strtoupper($value);
    }

    public function getCountryAttribute($value)
    {
        return strtoupper($value);
    }

    public function setIsoAttribute($value)
    {
        $this->attributes['iso'] = strtoupper($value);
    }

    public function getIsoAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] = strtolower($value);
    }

    public function getLanguageAttribute($value)
    {
        return strtolower($value);
    }

    public function getFlagAttribute()
    {
        return $this->flag();
    }

    public function flag()
    {
        return ( "<i class='fflag fflag-".$this->iso." ff-md ff-wave ff-lt'></i>" );
    }

    public function flagsm()
    {
        return ( "<i class='fflag fflag-".$this->iso." ff-sm ff-wave ff-lt'></i>" );
    }

    public function scopeSearch($query, $search)
    {
        $countries=Country::getAll();
        $filtered=$countries->filter(function($value,$key) use($search)
        {
            return (strpos( mb_strtoupper($value->country), mb_strtoupper($search) ) !== false);
        })->pluck('id');

        if ($filtered->isEmpty())
        {
            return $query->where('country','like','%'.mb_strtoupper($search).'%')
                ->orWhere('iso','like','%'.$search.'%')
                ->orWhere('iso3','like','%'.$search.'%')
                ->orWhere('numcode','like','%'.$search.'%')
                ->orWhere('phonecode','like','%'.$search.'%');
        }
        return $query->whereIn('id', $filtered->toArray() );
    }
}
