@props([
    'avatar'    =>  url('storage/'.config('lopsoft.default_avatar'))
])

<img src='{{ $avatar }}' {{  $attributes->merge([ 'class' => 'w-8 h-8 rounded-full' ]) }} />
