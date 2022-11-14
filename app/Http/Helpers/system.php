<?php

use Illuminate\Support\Str;

    /************************************************/
    /* Debug                                        */
    /************************************************/

    if (! function_exists('delayCom')) {

        function delayCom($count=1000000000)
        {
            for($i=0,$a=0;$i<$count;$i++) $a=$a+$i;
        }
    }

    /************************************************/
    /* Translate                                    */
    /************************************************/

    if (! function_exists('translate')) {

        function translate( $s, $g='common', $convert='' )
        {
            $trans=__("$g.$s");
            $ret=($trans==$g.'.'.$s)?__("$s"):$trans;
            switch($convert)
            {
                case 'headline':
                    $ret=Str::headline($ret);
                    break;
            }
            return $ret;
        }
    }

    if (! function_exists('transup')) {

        function transup( $s, $g='common' )
        {
            return mb_strtoupper(translate($s, $g));
        }
    }

    if (! function_exists('transdown')) {

        function transdown( $s, $g='common' )
        {
            return mb_strtolower(translate($s, $g));
        }
    }

    


