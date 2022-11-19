<?php

return [

    /*
    |--------------------------------------------------------------------------
    | System
    |--------------------------------------------------------------------------
    |
    */

    'version'               =>  '0.1a',
    'vendor'                =>  'lopsoft',
    'copyright'             =>  '(C) Lopsoft 2022',
    'vendorlink'            =>  'https://lopsoft.com',
    'vendorweb'             =>  'www.lopsoft.com',
    'vendorlogo_overblack'  =>  'system/vendorlogo_bgblack.png',
    'vendorlogo'            =>  'system/vendorlogo.png',
    'prefix_admin'          =>  'admin',
    'entrypoint_website'    =>  false,

    /*
    |--------------------------------------------------------------------------
    | System presets
    |--------------------------------------------------------------------------
    |
    */

    'default_paginate'          =>  15,
    'emails_generate_domain'    =>  'lopsoft.com',
    'temporal_dir'              =>  'temp',
    'images_disk'               =>  'images',
    'image_width'               =>  500,
    'image_height'              =>  500,
    'font_size'                 =>  '16px',

    /*
    |--------------------------------------------------------------------------
    | App
    |--------------------------------------------------------------------------
    |
    */
    'app_name'              =>  'LOPSOFT SISTEMAS',

    /*
    |--------------------------------------------------------------------------
    | Emails
    |--------------------------------------------------------------------------
    |
    */
    'email_from'              =>  'noreply@lopsoft.com',
    'email_from_name'         =>  'LOPSOFT SISTEMAS',
    'email_to'                =>  'jllopezvicente@gmail.com',

    /*
    |--------------------------------------------------------------------------
    | Date
    |--------------------------------------------------------------------------
    |
    */
    'country_default'       =>  'DOMINICAN REPUBLIC',       // In english ( see table countries )
    'timezone_default'      =>  'America/Santo_Domingo',
    'locale_default'        =>  'es',                       // code in languages table
    'firstweekday'          =>  1,                          // 0=Sunday, 1=Monday
    'date_format'           =>  'd/m/Y',                    //
    'time_format'           =>  'hh:mm',

    /*
    |--------------------------------------------------------------------------
    | Imageupload
    |--------------------------------------------------------------------------
     */

    'garbagecollection_days'    =>  3,
    'default_image'             =>  'defaults/default_image.png',

    /*
    |--------------------------------------------------------------------------
    | Videoupload
    |--------------------------------------------------------------------------
     */

    'garbagecollection_days'    =>  3,
    'default_video'             =>  'defaults/default_video.png',


    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    |
    */

    'default_avatar'        => 'profiles/defaults/userdefault.png',
    'profile_images_folder' => 'profiles/',
    'avatar_max_size'       => 5120, // 5Mb
    'avatar_width'          => 300,
    'avatar_height'         => 300,
    'user_level'            => 100,         // Min user level
    'user_default_email_domain' =>  'lopsoft.com',
    'default_password'      => '123456789',


    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    */

    'default_quota'         =>  10*1024*1024,        // 10Mb by default 



    /*
    |--------------------------------------------------------------------------
    | Condos
    |--------------------------------------------------------------------------
    |
    */

    'default_condo'         => 'profiles/defaults/condodefault.png',
    'condo_max_size'        => 5120, // 5Mb
    'condo_width'           => 300,
    'condo_height'          => 300,


    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    */

    'currency_api'  => 'https://v6.exchangerate-api.com/v6/0905ec1bd05e22078f86294d/latest/',


];
