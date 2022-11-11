@props([
    'index' =>  1,
])

<div x-show='showOption[{{$index}}]' class='h-full overflow-hidden text-base' style='min-height:600px'>
    {!! $slot !!}
</div>
