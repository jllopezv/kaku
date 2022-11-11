@props([
    'link'  =>  '',
    'src'   =>  '',
])

<div {{ $attributes->merge(['class' => "pr-1 w-60 overflow-x-hidden ".($link?' hover:cursor-pointer ':'' ) ]) }}>
    @if($link)
        <a href='{{ $link }}'>
    @endif
    <img src="{{ asset('storage/'.$src) }}" />
    @if($link)
        </a>
    @endif
</div>
