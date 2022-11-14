<?php

namespace App\Models\Aux;

use App\Models\Traits\HasOwner;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;


class Color extends Model
{

    use HasOwner;
    use IsAuditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'textcolor', 'background',
    ];

    protected $appends = ['tag'];

    public function setNameAttribute($value)
    {
        $this->attributes['name']=mb_strtoupper($value);
    }

    public function getNameAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function setTextcolorAttribute($value)
    {
        $this->attributes['textcolor']=mb_strtolower($value);
    }

    public function getTextcolorAttribute($value)
    {
        return mb_strtolower($value);
    }

    public function setBackgroundAttribute($value)
    {
        $this->attributes['background']=mb_strtolower($value);
    }

    public function getBackgroundAttribute($value)
    {
        return mb_strtolower($value);
    }

    public function getTagAttribute($size='text-sm')
    {
        return "<span class='px-2 font-bold ".$size." ".($this->textcolor==''?"text-white":strtolower('text-'.$this->textcolor))." ".($this->background==''?"bg-slate-600":strtolower('bg-'.$this->background))." rounded-md'>".($this->name==''?"MUESTRA":$this->name)."</span>";
    }

    public function getCustomTag($tag, $size='text-sm')
    {
        return "<span class='px-2 font-bold ".$size." ".($this->textcolor==''?"text-white":strtolower('text-'.$this->textcolor))." ".($this->background==''?"bg-slate-600":strtolower('bg-'.$this->background))." rounded-md'>".$tag."</span>";
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%' );
    }


}
