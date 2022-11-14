<?php

namespace App\Models\Aux;

use Illuminate\Support\Str;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
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
        static::deleting(function(Image $item)
        {
            $item->deleteImage();
        });
        static::updating(function(Image $item)
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
        'image', 'path'
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

    public function entity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    public function entityId($entity_id)
    {
        $this->entity_id = $entity_id;
        return $this;
    }

    public function destPath($path)
    {
        $this->destpath = $path;
        return $this;
    }

    public function disk($disk)
    {
        $this->disk = $disk;
        return $this;
    }

    public function prefix($prefix)
    {
        $this->image_prefix = $prefix;
        return $this;
    }

    public function description($description)
    {
        $this->image = $description;
        return $this;
    }

    public function single()
    {
        $this->multiple = false;
        return $this;
    }

    public function multiple()
    {
        $this->multiple = true;
        return $this;
    }

    public function deleteImage($path = '')
    {
        if ($path=='') $path = $this->path;
        if ($this->disk == '')  $this->disk = getSetting('images_disk');
        if (!Str::startsWith($path,'system'))  Storage::disk($this->disk)->delete($path);
    }

    public function saveImage()
    {
        
        if ($this->disk == '')  $this->disk = getSetting('images_disk');
        if ($this->source=='' || !Storage::disk($this->disk)->exists($this->source)) return null;
        
        $path='';
        
        if ($this->destpath!=null)
        {
            if ($this->source!='')
            {
                $filename = $this->image_prefix.date('YmdHis').uniqid().'.png';
                if (Storage::disk($this->disk)->move($this->source, $this->destpath . '/' . $filename))
                {
                    $path = $this->destpath . '/' . $filename;
                }
            }
        }
        else
        {
            $path = $this->source;
        }

        $this->path = $path;
        $this->imageable_type = $this->entity;
        $this->imageable_id = $this->entity_id;

        if ($this->imageable_type != null && $this->imageable_id != null)
        {
            if ($this->multiple == false)
            {
                $settingrecord = ($this->imageable_type)::find($this->imageable_id);
                $image = $settingrecord->images->first();
                if ($image != null)
                {
                    if ($this->source !=null && $this->source != '')
                    {
                        $image->update($this->toArray());
                        return $image;
                    }
                    else
                    {
                        $image->delete();
                        return null;
                    }
                }
            }
        }
        if ($this->path) $this->save();
        return $this;
    }

    /*******************************************/
    /* Static
    /*******************************************/

    static public function createImage()
    {
        $image = new Image;
        $image->source = '';
        return $image;
    }

    static public function getFromFile($source)
    {
        $image = new Image;
        $image->source = $source==null?'':$source;
        return $image;
    }

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('image', 'like', '%'.$search.'%' )
            ->orWhere( 'path', 'like', '%'.$search.'%' );
    }

}
