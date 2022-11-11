@props([
    'text'          => '',
    'icon'          => '',          // fontawesome 'fa fa-user'
    'iconalign'     =>  'left',     // left, right
    'ref'           => '',          // alpinejs compatibilty
    'disabled'      => false,
    'link'          => '',
    'uppercase'     => false,
    'classcolor'    => "bg-violet-400 hover:bg-violet-600 active:bg-violet-600 focus:border-violet-600",
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
