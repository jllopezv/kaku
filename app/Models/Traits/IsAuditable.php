<?php

namespace App\Models\Traits;

use App\Models\Aux\Audit;
use Illuminate\Support\Facades\Request;

trait IsAuditable
{
    /**
     * Boot Trait
     */
    public static function bootIsAuditable()
    {
        static::created(function($item)
        {
            if (auth()->check())
            {
                $record = new Audit;
                $record->action = 'create';
                $record->ip = Request::ip();
                $record->old = json_encode([]);
                $changes = $item->getDirty();
                unset($changes['created_at']);
                unset($changes['updated_at']);
                unset($changes['created_by']);
                unset($changes['updated_by']);
                $record->new = json_encode($changes);
                $record->tablename = $item->getTable();
                $record->auditable_type = get_class($item);
                $record->auditable_id = $item->id;
                $record->created_by = auth()->user()->id;
                $record->save();
            }
        });

        static::updated(function($item)
        {
            if (auth()->check())
            {
                $record = new Audit;
                $record->action = 'update';
                $record->ip = Request::getClientIp(); //Request::ip();
                $changes = $item->getDirty();
                unset($changes['created_at']);
                unset($changes['updated_at']);
                unset($changes['created_by']);
                unset($changes['updated_by']);
                $record->new = json_encode($changes);
                $original=[];
                foreach($changes as $key=>$value)
                {
                    $original[$key] = $item->getOriginal($key);
                }
                $record->old = json_encode($original);
                $record->tablename = $item->getTable();
                $record->auditable_type = get_class($item);
                $record->auditable_id = $item->id;
                $record->created_by = auth()->user()->id;
                $record->save();
            }
        });

        static::deleted(function($item)
        {
            if (auth()->check())
            {
                $record = new Audit;
                $record->action = 'delete';
                $record->ip = Request::getClientIp(); //Request::ip();
                $original = $item->getOriginal();
                unset($original['created_at']);
                unset($original['updated_at']);
                unset($original['created_by']);
                unset($original['updated_by']);
                $record->old = json_encode($original);
                $changes = $item->getDirty();
                unset($changes['created_at']);
                unset($changes['updated_at']);
                unset($changes['created_by']);
                unset($changes['updated_by']);
                $record->new = json_encode($changes);
                $record->tablename = $item->getTable();
                $record->auditable_type = get_class($item);
                $record->auditable_id = $item->id;
                $record->created_by = auth()->user()->id;
                $record->save();
            }
        });

    }
}
