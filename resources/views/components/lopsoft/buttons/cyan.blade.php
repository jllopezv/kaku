@props([
    'text'          => '',
    'icon'          => '',          // fontawesome 'fa fa-user'
    'iconalign'     =>  'left',     // left, right
    'ref'           => '',          // alpinejs compatibilty
    'disabled'      => false,
    'link'          => '',
    'uppercase'     => false,
    'classcolor'    => "bg-cyan-600 hover:bg-cyan-800 active:bg-cyan-800 focus:border-cyan-800",
    ])

<x-lopsoft.buttons.button-base
    :ref='$ref'
    :text='$text'
    :icon='$icon'
    :iconalign='$iconalign'
    :disabled='$disabled'
    :link='$link'
    :uppercase='$uppercase'
    {{ $attributes ->class([$classcolor => !$disabled ]) }}
    >
    {!! $slot !!}
</x-lopsoft.button.button-base>
