@props([
    'bgcolor'  => 'bg-slate-300',
    'fbcolor'  => 'text-slate-600',
    'barcolor' => 'bg-blue-300',
    'size'     => 'text-xs',
    'percent'  => 0,
    'extra'    => '',
])

<div class='flex items-center justify-start'>
    <div class='relative w-full {{ $bgcolor }} {{ $size }} h-6'>
        <div class='w-full h-6 {{ $barcolor }} text-center' style="width: {{ $percent.'%' }}">&nbsp;</div>
        <div class='absolute top-1 left-0 text-center w-full {{ $fbcolor }} {{ $extra }}'>{{ $percent.'%' }}</div>
    </div>
</div>
