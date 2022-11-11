@props([
    'tag'  =>  'p',
    'text' =>  '',
    'size' =>  '18',
    'weight' => 'normal',
    'link'    => ''
])

<{{ $tag }} style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3d4852; font-size: {{$size}}px; font-weight: {{$weight}}; margin-top: 0; text-align: left; overflow-wrap: break-word; ">
    @if($link != '')
        <a href="{{ $link }}" target='_blank' style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #3869d4;">

    @endif
        {!! $text !!}
    @if($link != '')
        </a>
    @endif
</{{$tag}}>
                                    