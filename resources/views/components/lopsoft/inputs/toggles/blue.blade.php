@props ([
    'color'     => 'blue',
    'model'     => '',
    'label'     => 'Label',
    'sublabel'  => '',
    'upLabel'   => 'false',     // if true, label is on toggle
    'value'     => '',
    'readonly'  => 'false',
    'inline'    => 'false',
    'prelabel'  => '',
    'id'        =>  Str::random(20),
    'silentmode'    =>  'false',            // dont send event
    'labelstyle'    =>  'text-gray-500 font-bold',
    'sublabelstyle' =>  'text-gray-400 font-bold',
])

<x-lopsoft.inputs.toggles.toggle id="{{ $id }}" silentmode="{{ $silentmode }}" color="{{ $color }}" model="{{ $model }}" label="{!! $label !!}" sublabel="{{ $sublabel }}" prelabel='{{ $prelabel }}' value="{{ $value??'' }}" readonly="{{ $readonly }}" inline="{{ $inline }}" upLabel="{{ $upLabel }}"  labelstyle="{{ $labelstyle }}" sublabelstyle="{{ $sublabelstyle }}"/>
