<div class="w-full">

    <div class='flex-wrap xl:flex-nowrap flex items-center justify-center sm:justify-between'>

        <div class='w-full text-slate-400 text-center sm:text-left'>
            <span>Mostrando del {{ ($page_showed+$page_offset)>0?($page_offset+1):0 }} al {{  $page_showed+$page_offset }} de {{ $page_total }}</span>
            @if(count($rowsselected))
                <span class='block sm:inline'>({{ count($rowsselected) }} seleccionados)</span>
            @endif
        </div>

        <div class='w-full flex-wrap flex items-center justify-end'>

            <div class='mt-1 hidden w-full sm:w-auto sm:flex items-center justify-start sm:justify-center'>
                <div wire:click='paginationFirst' class=" flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                    <div class=''><i class='fa fa-angle-double-left'></i></div>
                </div>

                <div wire:click='paginationPrevious' class="ml-0.5 flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                    <div class=''><i class='fa fa-angle-left'></i></div>
                </div>
            </div>


            <div class='w-full sm:w-auto flex items-center justify-center mt-1'>
                @foreach($page_navigator as $navigator)
                    <div class="pl-0.5 text-center">
                        <div wire:click="navigateTo({{ $navigator }})" class="{{ $navigator!=$page_current?' cursor-pointer':' text-green-300 cursor-default ' }} rounded items-center p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 {{ $navigator<10?'w-10':'' }} ">
                            {{ $navigator }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class='w-full sm:w-auto flex items-center justify-between sm:justify-center mt-1'>
                <div class='sm:hidden w-full flex items-center justify-start'>
                    <div wire:click='paginationFirst' class=" flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                        <div class=''><i class='fa fa-angle-double-left'></i></div>
                    </div>
                    <div wire:click='paginationPrevious' class="ml-0.5 flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                        <div class=''><i class='fa fa-angle-left'></i></div>
                    </div>
                </div>
                <div class='w-full  flex items-center justify-end'>
                    <div wire:click='paginationNext' class="ml-0.5 flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                        <div class=''><i class='fa fa-angle-right'></i></div>
                    </div>

                    <div wire:click='paginationLast' class="ml-0.5 flex items-center justify-center cursor-pointer rounded p-2 border border-transparent focus:outline-none focus:shadow-none font-bold uppercase text-white    transition ease-in-out duration-150  bg-slate-600 hover:bg-slate-700 active:bg-slate-600 focus:border-slate-600 w-10">
                        <div class=''><i class='fa fa-angle-double-right'></i></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--
    Pagina actual: {{ $page_current }}<br/>
    PerPage: {{ $page_perpage }}<br/>
    Total registros: {{ $page_total }}<br/>
    Offset: {{ $page_offset }}<br/>
    Paginas: {{ ceil( $page_total / $page_perpage ) }}<br/>
    Total seleccionados: {{ count($rowsselected) }}
    Mostrados: {{ $page_showed }} del {{ $page_offset+1 }} al {{  $page_showed+$page_offset }}
    --}}
</div>
