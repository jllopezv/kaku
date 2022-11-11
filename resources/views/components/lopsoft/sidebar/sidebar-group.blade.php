@props([
    'id'    =>  Str::random(20),
    'text'  => 'group',
])

<div x-data="sidebarGroup()" x-init="initSidebarGroup('{{ $id }}')">
    <div
            id='sidebargroup_{{ $id }}'
            @click="toggleSidebarGroup()"
            {{ $attributes->merge(['class' => 'sidebar-group p-2 w-full overflow-x-hidden rounded hover:bg-gray-700 hover:cursor-pointer' ]) }}>

        <div  class='flex items-center justify-between whitespace-nowrap'>
            <div class=''>
                {!!  $text !!}
            </div>
            <div id='sidebargroupcaret_{{ $id }}' class='sidebar-caret'>
                <i class='fa fa-angle-down'></i>
            </div>
        </div>


    </div>
    <div id='sidebargroupcontent_{{ $id }}' class='pl-1'>
        {!! $slot !!}
    </div>
</div>
