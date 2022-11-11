@props([
    'avatar'    =>  url('storage/'.config('lopsoft.default_avatar')),
])

<img src='{{ $avatar }}' {{  $attributes->merge([ 'class' => 'w-16 h-16 rounded-full' ]) }} />
