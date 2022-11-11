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
    'labelclass'                    => '',
    'nopadding'                     => false,
])
<div class="w-full {{ $nopadding?'':'p-1' }} text-base">
    <div class="{{ $labelclass }} font-bold {{ $nopadding?'pl-3':'pl-2' }} {{ !$haserrors?(!$readonly?'text-gray-500':'text-gray-500'):'text-red-500' }}">
        {!! $label==""?($forcelabelheight?'&nbsp;':''):$label !!}
    </div>
    <div class=" {{ $haserrors?'text-red-400':'text-gray-400' }} text-xs font-bold pl-2 leading-tight">
        {!! $sublabel==""?($forcelabelheight?'&nbsp;':''):$sublabel !!}
    </div>
</div>

