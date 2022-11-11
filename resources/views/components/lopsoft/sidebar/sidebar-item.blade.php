@props([
    'link' => '',
    'text' => 'default_text',
])

<div>
    @if($link)
        <a href='{{ $link }}'>
    @endif
    <div {{ $attributes->merge(['class' => (Route::current()->uri==$link?' sidebar-route-active ':'')." flex items-center justify-start my-1 p-2 w-full overflow-x-hidden rounded hover:bg-gray-700 ".($link?' hover:cursor-pointer ':'' ) ]) }}>
        {!!  $text !!}
    </div>
    @if($link)
        </a>
    @endif
</div>
