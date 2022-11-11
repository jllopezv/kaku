@props([
    'text'          => '',
    'icon'          => '',          // fontawesome 'fa fa-user'
    'iconalign'     =>  'left',     // left, right
    'ref'           => '',          // alpinejs compatibilty
    'disabled'      => false,
    'link'          => '',
    'uppercase'     => false,
    'classcolor'    => "bg-yellow-600 hover:bg-yellow-800 active:bg-yellow-800 focus:border-yellow-800",
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
