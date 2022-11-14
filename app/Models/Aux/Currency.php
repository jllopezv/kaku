<?php

namespace App\Models\Aux;

use Carbon\Carbon;
use App\Models\Traits\HasOwner;
use App\Models\Traits\HasActive;
use App\Models\Traits\HasCurrent;
use App\Models\Traits\IsAuditable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasOwner;
    use IsAuditable;
    use HasActive;
    use HasCurrent;

    /*******************************************/
    /* Properties
    /*******************************************/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency', 'current', 'symbol', 'code', 'left', 'spaces', 'decimals', 'decimals_separator', 'thousands_separator', 'rate'
    ];

    /*******************************************/
    /* Relationships
    /*******************************************/

    /*******************************************/
    /* Accessors and mutators
    /*******************************************/

    /**
     * Set Code Uppercase
     *
     * @param  String $value
     * @return void
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code']=mb_strtoupper($value);
    }

    /**
     * Get Code in uppercase
     *
     * @param  string  $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return mb_strtoupper($value);

    }

    public function getString($value)
    {
        $value=trim($value);
        $value=doubleval($value);
        $ret=number_format($value, $this->decimals, $this->decimals_separator, $this->thousands_separator);
        if ($this->left)
        {
            $ret=$this->symbol.str_repeat(' ',$this->spaces).$ret;
        }
        else
        {
            $ret.=str_repeat(' ',$this->spaces).$this->symbol;
        }
        return $ret;
    }

    /*******************************************/
    /* Methods
    /*******************************************/

    public function setCurrent()
    {
        $currents=Currency::where('current', true)->get();
        foreach($currents as $current)
        {
            $current->current=false;
            $current->save();
        }
        $this->current=true;
        $this->rate=1;
        $this->save();
        Currency::updateRates();
    }

    public function updateRate()
    {
        $current=Currency::getCurrent();
        if ($current==null || $this->code=='' || $this->code==null || $this->current) return;
        $data=Currency::getRates();
        if (isset($data['conversion_rates'][$this->code]))
        {
            $this->rate=$data['conversion_rates'][$this->code];
            $this->save();
        }
    }

    public function convert($currency_id, $value)
    {
        $currency=Currency::find($currency_id);
        if ($currency==null) return null;
        if (!is_numeric($value)) $value=0;
        return doubleval(round(($currency->rate/$this->rate)*$value, $currency->decimals));
    }

    /*******************************************/
    /* Static
    /*******************************************/

    static public function getRates()
    {
        $current=Currency::getCurrent();
        $rates=Cache::get('currency_rates_'.$current->code);
        if ($rates==null || ($rates!=null && $rates['result']=='error'))
        {
            Cache::forget('currency_rates_'.$current->code);
            $rates=Cache::remember('currency_rates_'.$current->code,60*60*24, function() {
                $current=Currency::getCurrent();
                try{
                    $response = Http::get(config('lopsoft.currency_api').$current->code);
                    if ($response->json()['result']=='error') session()->flash('error', transup('updated_rate_failed'));
                    return $response->json();
                }
                catch(\Exception $e)
                {
                    return null;
                }
            });
            session()->flash('success', transup('updated_rates').' ('.$current->code.')');
        }
        return $rates;

    }

    static public function updateRates()
    {
        $current=Currency::getCurrent();
        if ($current==null) return;
        $currencies=Currency::query()->active()->get();
        $data=Currency::getRates();
        foreach($currencies as $currency)
        {
            if (!$currency->current)
            {
                if (isset($data['conversion_rates'][$currency->code]))
                {
                    $currency->rate=$data['conversion_rates'][$currency->code];
                    $currency->save();
                }
            }

        }
    }

    static public function getLastUpdate()
    {
        $data=Currency::getRates();
        $cachetime=Carbon::parse($data['time_last_update_unix']);
        return getStringFromCarbon($cachetime).' '.getTimeCarbon($cachetime);
        //return getCacheLastUpdate('currency_rates_'.Currency::getCurrent()?->code);
    }

    static public function getCurrent()
    {
        return Currency::where('current', 1)->first();
    }

    /*******************************************/
    /* Scopes
    /*******************************************/

    public function scopeSearch($query, $search)
    {
        return $query->where('currency', 'like', '%'.$search.'%' )
            ->orWhere( 'symbol', 'like', '%'.$search.'%' )
            ->orWhere( 'code', 'like', '%'.$search.'%' );
    }

    /**
     *  Cached function
     */
    static public function getAll()
    {
        // 30 days, 1 month
        return Cache::remember('currencies', 60*60*24*30, function() {
                return Currency::all();
            });
    }


}
