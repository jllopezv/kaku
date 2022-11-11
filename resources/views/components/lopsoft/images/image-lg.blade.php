@props([
    'image'    =>  url('storage/'.getSetting('images_disk').'/'.getSetting('default_image'))
])

<img src='{{ $image }}' {{  $attributes->merge([ 'class' => 'max-h-8' ]) }} />
