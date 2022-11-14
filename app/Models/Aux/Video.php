<?php

namespace App\Models\Aux;

use Illuminate\Support\Str;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\IsAuditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;

    public $entity = '';
    public $entity_id = 0;
    public $source = '';
    public $destpath = '';
    public $extension = '';
    public $disk = '';
    public $video_prefix = '';
    public $multiple = true;

    protected static function booted()
    {
        parent::boot();
        static::deleting(function(Video $item)
        {
            $item->deleteVideo();
        });
        static::updating(function(Video $item)
        {
            if ($item->getOriginal('path')!=$item->path)
            {
                $item->deleteVideo($item->getOriginal('path'));
            }
        });
    }

    /*******************************************/
    /* Properties
    /*******************************************/

    protected $fillable = [
        'video', 'path'
    ];

    protected $appends = [
        'filename'
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    public function videoable()
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
        $this->video_prefix = $prefix;
        return $this;
    }

    public function description($description)
    {
        $this->video = $description;
        return $this;
    }

    public function extension($extension)
    {
        $this->video = $extension;
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

    public function deleteVideo($path = '')
    {
        if ($path=='') $path = $this->path;
        if ($this->disk == '')  $this->disk = getSetting('images_disk');
        if (!Str::startsWith($path,'system'))  Storage::disk($this->disk)->delete($path);
    }

    public function saveVideo()
    {
        
        if ($this->disk == '')  $this->disk = getSetting('images_disk');
        if ($this->source=='' || !Storage::disk($this->disk)->exists($this->source)) return null;
        
        $path='';
        
        if ($this->destpath!=null)
        {
            if ($this->source!='')
            {
                $filename = $this->video_prefix.date('YmdHis').uniqid().'.'.$this->extension;
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
        $this->videoable_type = $this->entity;
        $this->videoable_id = $this->entity_id;

        if ($this->videoable_type != null && $this->videoable_id != null)
        {
            if ($this->multiple == false)
            {
                $settingrecord = ($this->videoable_type)::find($this->videoable_id);
                $video = $settingrecord->videos->first();
                if ($video != null)
                {
                    if ($this->source !=null && $this->source != '')
                    {
                        $video->update($this->toArray());
                        return $video;
                    }
                    else
                    {
                        $video->delete();
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

    static public function createVideo()
    {
        $video = new Video;
        $video->source = '';
        return $video;
    }

    static public function getFromFile($source)
    {
        $video = new Video;
        $video->source = $source==null?'':$source;
        $video->extension = Str::afterLast($video->source, '.');
        return $video;
    }

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('video', 'like', '%'.$search.'%' )
            ->orWhere( 'path', 'like', '%'.$search.'%' );
    }

}
