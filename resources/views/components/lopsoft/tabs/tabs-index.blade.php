@props([
    'title'         =>  'OPTION',
    'index'         =>  1,
    'disabled'      =>  false,
    'haserrors'     =>  false,
])
<div class=''>
    <div x-show='optionActive!={{$index}}'
            @if(!$disabled)
                @click="clearTabs(showOption); showOption[{{$index}}]=true; optionActive={{$index}};"
            @endif
    >
        <div class=" px-4 py-3 m-1 font-bold {{ $haserrors?' text-red-500':' text-gray-800 ' }} rounded-md cursor-pointer text-base {{ !$disabled?( $haserrors?' hover:text-red-300 hover:bg-slate-500 bg-slate-100':' hover:text-white hover:bg-slate-500 bg-slate-100'):'bg-slate-50 text-slate-300' }} ">
            {!! $title !!}
        </div>
    </div>
    {{-- ACTIVE --}}
    <div x-show='optionActive=={{$index}}' @click="clearTabs(showOption); showOption[{{$index}}]=true;">
        <div class="px-4 py-3 m-1 font-bold {{ $haserrors?' text-red-400 ':' text-green-300 ' }} bg-gray-700 rounded-md cursor-pointer text-base">
            {!! $title !!}
        </div>
    </div>
</div>


