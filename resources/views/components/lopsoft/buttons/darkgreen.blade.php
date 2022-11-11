@props([
    'text'          => '',
    'icon'          => '',          // fontawesome 'fa fa-user'
    'iconalign'     =>  'left',     // left, right
    'ref'           => '',          // alpinejs compatibilty
    'disabled'      => false,
    'link'          => '',
    'uppercase'     => false,
    'classcolor'    => "bg-green-700 hover:bg-green-900 active:bg-green-900 focus:border-green-900",
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
