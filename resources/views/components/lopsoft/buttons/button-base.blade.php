@props([
    'text'          => '',
    'icon'          => '',          // fontawesome fa fa-user
    'iconalign'     => 'left',      // left, right
    'ref'           => '',          // alpine compatilibity
    'disabled'      => false,
    'block'         => false,       // w-full
    'link'          => '',
    'uppercase'     => true,
    'stretch'       => false,
])

<div class=" text-base">
    @if($link)
        <a href="{{ $link }}">
    @endif
    <div
        @if($ref)
            x-ref="{{$ref}}"
        @endif
        {{ $attributes->class([
                'rounded items-center p-2 border border-transparent focus:outline-none focus:shadow-none',
                'font-bold text-white' => !$disabled,
                'bg-gray-300 hover:bg-gray-300 active:bg-gray-300 focus:bg-gray-300 text-gray-400 font-bold' => $disabled,
                'uppercase' => $uppercase,
                'w-full' => $block,
                'cursor-pointer' => !$disabled,
                'transition',
                'ease-in-out',
                'duration-150'
            ]) }}
        >

        <div class='flex items-center justify-center'>
            @if($icon && $iconalign=='left')
                <div class=" {{ $text ? 'mr-1' : '' }} ">
                    <i class='{{ $icon }}'></i>
                </div>
            @endif
            <div>
                @if(!$text)
                    {!! $slot !!}
                @else
                    {!! $text !!}
                @endif
            </div>
            @if($icon && $iconalign=='right')
                <div class=" {{ $text ? 'ml-1' : '' }} ">
                    <i class='{{ $icon }}'></i>
                </div>
            @endif
        </div>

    </div>
    @if($link)
        </a>
    @endif
</div>
