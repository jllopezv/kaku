@props ([
    'color'     => 'red',
    'model'     => '',
    'label'     => 'Label',
    'sublabel'  => 'sublabel',
    'upLabel'   => 'false',     // if true, label is on toggle
    'value'     => 0,
    'readonly'  => 'false',
    'inline'    => 'false',
    'prelabel'  => '',
    'id'        =>  Str::random(20),
    'silentmode'    =>  'false',            // dont send event
])
<x-lopsoft.inputs.toggles.toggle id="{{ $id }}" silentmode="{{ $silentmode }}" color="{{ $color }}" model="{{ $model }}" label="{{ $label }}" sublabel="{{ $sublabel }}" prelabel='{{ $prelabel }}' value="{{ $value }}" readonly="{{ $readonly }}" inline="{{ $inline }}" upLabel="{{ $upLabel }}" />
