@props([
    'avatar'    =>  url('storage/'.config('lopsoft.default_avatar')),
])

<img src='{{ $avatar }}' {{  $attributes->merge([ 'class' => 'w-28 h-28 rounded-full' ]) }} />
