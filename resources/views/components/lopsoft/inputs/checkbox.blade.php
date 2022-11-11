<div class='flex w-full h-full items-center justify-center'>
    <div class=''>
        <input type='checkbox'
            @if($readonly??false)
                onclick='return false;'
            @endif
            {{--wire:click.stop='update{{ $checkboxmodel??'checkboxesSelected' }}'--}}
            id="{{ $id }}" value="{{ $value }}" wire:model.lazy="{{ $checkboxmodel??'checkboxesSelected' }}"
            class="appearance-none {{ ($readonly??false)?'':'cursor-pointer' }} h-5 w-5 rounded-xl border-none {{ $customclass??'bg-slate-400 checked:hover:bg-blue-400 hover:bg-blue-400 checked:bg-blue-400  checked:focus:bg-blue-400 ' }}
            hover:shadow-none hover:ring-offset-0
            active:shadow-none active:ring-offset-0
            focus:shadow-none focus:ring-0  focus:ring-offset-0"/>
    </div>
</div>
