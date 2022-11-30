@props([
    'id'            => Illuminate\Support\Str::random(20),
    'readonly'      => false,
    'haserrors'     => $errors->has($id??''),
    'placeholder'   => '',
    'customclass'   => false,
    'hidelabel'     => false,
    'label'         => '',
    'sublabel'      => '',
])

<div class="w-full">
    @if(!$hidelabel)
        <div class="font-bold pl-2 {{ !$haserrors?(!$readonly?'text-gray-500':'text-gray-500'):'text-red-500' }}">
            {!! $label !!}
        </div>
        <div class=" {{ $haserrors?'text-red-400':'text-gray-400' }} text-xs font-bold pl-2 leading-tight">
            {!! $sublabel !!}
        </div>
    @endif
    <div class="relative">
        <input 
            id="{{ $id }}"
            {{ $attributes->class([
                'w-full p-1 apparence-none rounded border-2 placeholder-gray-300 transition duration-300 focus:ring-0 focus:outline-none leading-tight',
                'text-gray-700 bg-gray-50 border-gray-200 focus:text-gray-800  hover:border-gray-300 focus:border-gray-500' => !$readonly && !$haserrors && !$customclass,
                'text-gray-700 bg-gray-50 border-gray-200 hover:border-gray-100 focus:border-gray-100' => $readonly && !$haserrors,
                'text-red-700 bg-red-50 border-red-200 focus:text-red-800  hover:border-red-300 focus:border-red-500' => $haserrors,
                '' => $customclass && !$haserrors && !$readonly,
            ]) }}
            @if($readonly) readonly @endif
            @if($placeholder) placeholder="{!! $placeholder !!}" @endif
        />
    </div>
</div>

