@props([
    'avatar'    =>  url('storage/'.config('lopsoft.default_avatar'))
])

<img src='{{ $avatar }}' {{  $attributes->merge([ 'class' => 'w-6 h-6 rounded-full' ]) }} />
