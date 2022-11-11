@props ([
    'color'     => 'blue',
    'model'     => '',
    'label'     => 'Label',
    'sublabel'  => '',
    'upLabel'   => 'false',
    'value'     => 0,
    'readonly'  => 'false',
    'inline'    => 'false',
    'prelabel'  => '',
    'id'        =>  Str::random(20),
    'silentmode'    =>  'false',            // dont send event
    'labelstyle'    =>  'text-gray-500 font-bold',
    'sublabelstyle' =>  'text-gray-400 font-bold',
])

<div class="text-base w-full {{ $inline=='1'?'':'mb-6' }} ">
    <div class='w-full'>
        @if($upLabel=='1')
            <div class='{{ $labelstyle }} pl-3'>
                {!! $label??'' !!}
            </div>
            <div class='pl-3 text-xs leading-tight {{ $sublabelstyle }}'>
                {!! $sublabel??'' !!}
            </div>
        @endif
    </div>
    <div class='px-1'>
        @if($upLabel!='1')
            <label for="{{ $id }}" class="flex items-center cursor-pointer">
                <!-- label -->
                @if($prelabel!='')
                <div class="ml-2 pr-2">
                    <div class='font-bold text-gray-500'>
                        {!! $label??'' !!}
                    </div>
                    <div class='font-bold text-gray-400 text-xs leading-tight'>
                        {!! $sublabel??'' !!}
                    </div>
                </div>
                @endif
        @endif
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input type="checkbox" id="{{ $id }}" class="sr-only"
                wire:click.stop="{{ $silentmode!=='false'?'':'update'.($model??'checkboxesSelected') }}"
                wire:model="{{ $model }}" value="{{ $value }}"
                @if($readonly=='true')
                    disabled
                @endif>
            <!-- line -->
            <div class="block toggle-{{ $color }} w-10 h-6 rounded-full"></div>
            <!-- dot -->
            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
        </div>
        @if($upLabel!='1')
                <!-- label -->
                @if($prelabel=='')
                    <div class="">
                        <div class='ml-3 {{ $labelstyle }}'>
                            {!! $label??'' !!}
                        </div>
                        <div class='{{ $sublabelstyle }} pl-3 text-xs leading-tight'>
                            {!! $sublabel??'' !!}
                        </div>
                    </div>
                @endif
            </label>
        @endif
    </div>

  </div>
