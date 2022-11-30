<div 
    x-data='' 
    x-cloak 
    wire:init='initComponent' 
    @focus.window="$wire.reloadData" 
    class="p-2 w-full {{ $pagefixed?'h-full':'' }} border-4 border-red-500">
    <div  class='w-full h-full bg-white'>  
        <div class='relative w-full h-full flex flex-col'>
            {{-- HEADER --}}  
            <div class="w-full flex items-center">
                {{-- LEFT --}}
                <div class='flex flex-grow py-1'>
                    <x-lopsoft.buttons.green text='add' />
                </div>
                {{-- RIGHT --}}
                <div class='p-2'>
                    <x-lopsoft.inputs.newinput 
                        id='search'
                        wire:model.debounce.500ms='search'
                        placeholder='search...'
                    />
                </div>
                <div x-data="{ openColumns: false }" class='p-2 '>
                    <div class='relative'>
                        <div @click='openColumns = !openColumns' class='cursor-pointer text-slate-400 hover:text-slate-600'>
                            <i class='fa fa-fw fa-list'></i>
                        </div>
                        <div x-show='openColumns' @click.away='openColumns = false' class='absolute right-0 top-7 w-56 z-50 '>
                            <div class='flex flex-col '>
                                <div class='font-bold bg-white text-white rounded-t-md p-2 border-t border-x border-slate-500 shadow-md'>
                                    <div class='w-full border-b border-slate-300 text-slate-600 p-2' >
                                        {{ transup('show_columns') }}
                                    </div>
                                </div>
                                @foreach($columns as $index=>$column)
                                    <div class='p-2 bg-white border-x border-slate-500 shadow-md'>
                                        <div class=''>
                                            <x-lopsoft.inputs.toggles.blue 
                                            id="checkbox_column_{{ $column['field'] }}"
                                            model="showedcolumns"
                                            value="{{ $index }}"
                                            label="{{ $column['name'] }}"
                                            inline/>
                                            
                                        </div>
                                    </div>
                                @endforeach
                                <div class='rounded-b-md p-1 bg-white border-b border-x border-slate-500 shadow-md'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="{ openOptions: false }" class='p-2 cursor-pointer text-slate-400 hover:text-slate-600'>
                    <div class='relative'>
                        <div @click='openOptions = !openOptions' class='cursor-pointer text-slate-400 hover:text-slate-600'>
                            <i class='fa fa-fw fa-ellipsis-vertical'></i>
                        </div>
                        <div x-show='openOptions' @click.away='openOptions = false' class='absolute right-0 top-7 w-56 z-50 '>
                            <div class='flex flex-col '>
                                <div class='font-bold bg-white text-white rounded-t-md p-2 border-t border-x border-slate-500 shadow-md'>
                                    <div class='w-full border-b border-slate-300 text-slate-600 p-2' >
                                        {{ transup('options') }}
                                    </div>
                                </div>
                                
                                    <div class='p-2 bg-white border-x border-slate-500 shadow-md'>
                                        <div class='' @click='openOptions = false'>
                                            <x-lopsoft.inputs.toggles.blue 
                                            id="checkbox_pagefixed"
                                            model="pagefixed"
                                            value="{{ $pagefixed }}"
                                            label="{{ transup('fixed_page') }}"
                                            inline/>
                                            
                                        </div>
                                    </div>
                                
                                <div class='rounded-b-md p-1 bg-white border-b border-x border-slate-500 shadow-md'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:loading.delay class='w-full h-full flex items-center justify-center bg-white'>
                <div class='w-full h-full flex items-center justify-center'>
                    <i class="fa-solid fa-circle-notch fa-4x fa-spin text-slate-300"></i><span class='text-slate-300 text-2xl pl-2'>loading data...</span>
                </div>
            </div>
            <div  wire:loading.delay.remove class='w-full h-full overflow-scroll'>
                <table class='table-fixed w-full' >
                    {{-- TABLE HEADER --}}
                    <thead class='w-full h-10 sticky top-0 bg-slate-800'>
                        <tr class='w-full bg-slate-800'>
                            @foreach($columns as $column)
                                @if($column['visible'])
                                    <th class=" text-slate-400 font-bold {{ $column['columnclass'] }} {{ $column['width'] }}">
                                        <div wire:click="setSort('{{ $column['field'] }}')" class="w-full h-full p-1 flex items-center 
                                            {{ $column['width'] }} {{ $column['columnclass'] }}  
                                            {{ $this->isActiveSort($column['field'])?' text-green-300 ':' ' }} 
                                            {{ $column['sortable']?' hover:text-white cursor-pointer ':' ' }}">
                                        {{ $column['title'] }}
                                        @if($column['sortable'])
                                            @if( $this->getSortDirection($column['field']) !== false )
                                                @if( $this->getSortDirection($column['field']) == 'asc' )
                                                    <i class='fa fa-caret-up pl-1'></i>
                                                @endif
                                                @if( $this->getSortDirection($column['field']) == 'desc' )
                                                    <i class='fa fa-caret-down pl-1'></i>
                                                @endif
                                            @else
                                                
                                            @endif
                                        @endif
                                        </div>
                                    </th>
                                @endif
                            @endforeach
                            <th class="items-center text-slate-400 p-1 font-bold">
                            </th>
                            <th class="items-center text-slate-400 p-1 font-bold w-48">
                                <div class='text-right'>
                                    {!! transup('actions') !!}
                                </div>
                            </th>            
                        </tr>
                    </thead>
                    <tbody class='w-full'>
                        {{-- CONTENT --}}
                        @foreach($dataset as $index=>$row)
                            <tr class='w-full odd:bg-blue-50 text-slate-600 hover:bg-blue-100 cursor-pointer'>
                                @foreach($columns as $column)
                                    @if($column['visible'])
                                        <td class="p-0  {{ $column['width'] }}">
                                            <div class='w-full h-full p-1 whitespace-nowrap flex items-center {{ $column['fieldclass'] }} overflow-x-hidden'>
                                                {!! $this->renderField($column['field'], $index, $row->id) !!}
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td class="items-center text-slate-400 p-1 font-bold">
                                </td>
                                <td class="flex items-center text-slate-400 p-1 font-bold justify-end">
                                    <div class=''>
                                        {!! transup('actions') !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach                
                    </tbody>
                </table>
            </div>
            {{-- FOOTER --}}
            <div wire:loading.delay.remove class='w-full static bg-pink-200 text-black p-1'>
                @include ('livewire.common.index-pagination')
            </div>
        </div>
    </div>
</div>