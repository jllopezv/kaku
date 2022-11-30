@props([
    'header',
    'sidebar',
    'content'
])

<div    x-cloak
        x-data="sidebar()"
        x-init="initSidebar()"
        class='w-screen h-screen '>

    <div @resize.window='handleResize()' class='flex flex-col w-full h-full'>
        
        {{-- HEADER --}}
        <div class='h-14 w-full bg-slate-800 text-white flex items-center justify-start p-1 overflow-hidden'>
            <div class='left grow flex items-center justify-start'>
                <div
                    @click.stop="handleOpen()"
                    class="mr-2">
                    <div {{--  x-show='!isWideScreen' --}}class="hover:bg-gray-600 px-2 py-1 rounded hover:cursor-pointer">
                        <i class=' fa fa-bars '></i>
                    </div>
                </div>
            </div>
            <div class='right'>
                right
            </div>
        </div>

        {{-- CONTENT WRAPPER --}}
        <div class='w-full h-full overflow-hidden'>
            <div class='relative flex flex-row w-full h-full'>
                <div @click.outside="handleAway()" id='sidebar' class='absolute top-0 left-0 md:relative sidebar nosb h-full bg-slate-900 text-white overflow-y-scroll overflow-x-hidden z-40'>
                    {!!  $sidebar !!}
                </div>
                <div class='h-full w-full overflow-scroll'>
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>

</div>