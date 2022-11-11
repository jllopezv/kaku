@props([
    'readonly'                      => false,
    'haserrors'                     => $errors->has($id),
    'mandatory'                     => false,
    'validated'                     => false,
    'help'                          => '',
    'helperror'                     => $errors->has($id)?$errors->first($id):'',
    'tooltip'                       => 'bottom', // top, bottom, left, right
    'label'                         => '',
    'forcelabelheight'              => false,    // Space in label in blank
    'sublabel'                      => '',
    'placeholder'                   => '',
    'autofocus'                     => false,
    'id'                            => Str::random(20),
    'formcontrol'                   => false,
    'rows'                          => '20',
])

<div class="w-full p-1 {{ $formcontrol!=true?'mb-6':'' }} text-base">
    <div class="font-bold text-base pl-2 {{ !$haserrors?(!$readonly?'text-gray-500':'text-gray-500'):'text-red-500' }}">
        {!! $label==""?($forcelabelheight?'&nbsp;':''):$label !!}
    </div>
    <div class=" {{ $haserrors?'text-red-400':'text-gray-400' }} text-xs font-bold pl-2 leading-tight">
        {!! $sublabel==""?($forcelabelheight?'&nbsp;':''):$sublabel !!}
    </div>
    <div class='relative w-full text-base'>
        <textarea
            id="{{ $id }}"
            @if(!$attributes->has('type'))
                type='text'
            @endif
            @if($autofocus) autofocus @endif
            {{ $attributes->class([
                'w-full apparence-none p-2 pr-5 rounded border-2 placeholder-gray-300 transition duration-300 focus:ring-0 focus:outline-none leading-tight',
                'text-gray-700 bg-gray-50 border-gray-200 focus:text-gray-800  hover:border-gray-300 focus:border-gray-500' => !$readonly && !$haserrors,
                'text-gray-700 bg-gray-50 border-gray-200 hover:border-gray-100 focus:border-gray-100' => $readonly && !$haserrors,
                'text-red-700 bg-red-50 border-red-200 focus:text-red-800  hover:border-red-300 focus:border-red-500' => $haserrors,
            ]) }}
            @if($readonly) readonly @endif
            @if($placeholder) placeholder="{!! $placeholder !!}" @endif
            rows='{{ $rows }}'
        ></textarea>
        <div class='absolute top-3 right-0'>
            @if($validated && !$haserrors)
                <div class="w-6 flex items-center justify-center">
                    <i class="fa fa-check-circle fa-sm apparence-none text-green-500"></i>
                </div>
            @endif
            @if($mandatory && $help && !$haserrors && !$validated)
                <div class="w-6 flex items-center justify-center">
                    <i @click="ShowInfo('{!! $help !!}')" class="fa-solid fa-circle-info fa-sm apparence-none text-slate-600 hover:text-slate-800 hover:cursor-pointer"></i>
                </div>
            @endif
            @if($haserrors && $helperror)
                <div class="w-6 flex items-center justify-center">
                    <i @click="ShowError('{!! $helperror !!}')" class="fa fa-exclamation-triangle fa-sm apparence-none text-red-400 hover:text-red-600 hover:cursor-pointer"></i>
                </div>
            @endif
        </div>
    </div>

</div>

