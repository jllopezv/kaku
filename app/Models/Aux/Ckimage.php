<?php

namespace App\Models\Aux;

use Illuminate\Support\Str;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ckimage extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;

    public $entity = '';
    public $entity_id = 0;
    public $source = '';
    public $destpath = '';
    public $disk = '';
    public $image_prefix = '';
    public $multiple = true;

    protected static function booted()
    {
        parent::boot();
        static::deleting(function(CkImage $item)
        {
            $item->deleteImage();
        });
        static::updating(function(CkImage $item)
        {
            if ($item->getOriginal('path')!=$item->path)
            {
                $item->deleteImage($item->getOriginal('path'));
            }
        });
    }

    /*******************************************/
    /* Properties
    /*******************************************/

    protected $fillable = [
        'nameid', 'path', 'imageable_type', 'imageable_id'
    ];

    protected $appends = [
        'filename'
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    public function imageable()
    {
        return $this->morphTo();
    }

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    public function getFilenameAttribute()
    {
        return Str::afterLast($this->path,'/');
    }

    /*******************************************/
    /* Methods
    /*******************************************/

    public function deleteImage($path='')
    {
        if ($path == '') $path = $this->path;
        if (!Str::startsWith($path,'system'))  Storage::disk(getSetting('images_disk'))->delete($path);
    }

    /*******************************************/
    /* Static
    /*******************************************/

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('nameid', 'like', '%'.$search.'%' )
            ->orWhere( 'path', 'like', '%'.$search.'%' );
    }

}
