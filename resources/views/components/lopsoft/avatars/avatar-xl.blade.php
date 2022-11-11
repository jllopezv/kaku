@props([
    'avatar'    =>  url('storage/'.config('lopsoft.default_avatar'))
])

<img src='{{ $avatar }}' {{  $attributes->merge([ 'class' => 'w-10 h-10 rounded-full' ]) }} />
