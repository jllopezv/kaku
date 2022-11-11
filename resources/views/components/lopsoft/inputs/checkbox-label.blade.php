<div class='h-full text-center flex p-1 mb-6'>
    <div class='font-bold text-gray-500 pl-2 mr-2'>
        {!! $label??'' !!}
    </div>
    <div class='text-center flex items-center justify-center'>
        <input type='checkbox'
            @if($readonly??false)
                onclick='return false;'
            @endif
            wire:click.stop='update{{ $checkboxmodel??'checkboxesSelected' }}' id="{{ $id }}" value="{{ $value }}" wire:model="{{ $checkboxmodel??'checkboxesSelected' }}"
            class="appearance-none {{ ($readonly??false)?'':'cursor-pointer' }} h-5 w-5 rounded-xl border-none bg-slate-400 checked:bg-blue-400
            hover:shadow-none hover:ring-offset-0
            active:shadow-none active:ring-offset-0
            focus:shadow-none focus:ring-0  focus:ring-offset-0"/>
    </div>
</div>
