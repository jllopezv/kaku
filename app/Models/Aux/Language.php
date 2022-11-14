<?php

namespace App\Models\Aux;

use App\Models\Traits\HasOwner;
use App\Models\Traits\IsAuditable;
use App\Models\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasTranslation;


    /**
     * Fields with translation
     *
     * @var array
     */
    protected $translatable = [ 'language' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language', 'code'
    ];

    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] = mb_strtoupper($value);
    }

    public function getLanguageAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function getFlagAttribute()
    {
        return ( "<i class='fflag fflag-".strtoupper(substr($this->code=='en'?'us':$this->code, 0, 2))." ff-md ff-wave ff-lt'></i>" );
    }

    public function scopeSearch($query, $search)
    {
        $languages=Language::all();
        $filtered=$languages->filter(function($value,$key) use($search)
        {
            return (strpos( mb_strtoupper($value->language), mb_strtoupper($search) ) !== false);
        })->pluck('id');

        if ($filtered->isEmpty())
        {
            return $query->where('language','like','%'.mb_strtoupper($search).'%')
                ->orWhere('code','like','%'.$search.'%');
        }

        return $query->whereIn('id', $filtered->toArray() );
    }

}
