@props([
    'header',
    'sidebar',
    'content'
])

<div
    x-cloak
    x-data="sidebar()"
    x-init="initSidebar()"
    class="flex h-screen bg-black">
    <div
        @resize.window='handleResize()'
        class="flex-1 flex flex-col overflow-hidden h-full">

        <header class="flex justify-between items-center bg-gray-900 text-white p-4 h-14">
            <div class='flex items-center justify-start'>
                <div
                    @click.stop="handleOpen()"
                    class="mr-2">
                    <div {{--  x-show='!isWideScreen' --}}class="hover:bg-gray-600 px-2 py-1 rounded hover:cursor-pointer">
                        <i class=' fa fa-bars '></i>
                    </div>
                </div>
                <div class=''>
                    {{ $header }}
                </div>
            </div>
            <div class='flex items-center justify-end'>
                <div class="flex items-center justify-end">
                    <div class=''>
                        {{--  debug screen size --}}
                        <div class='hidden 2xl:block'>2XL</div>
                        <div class='hidden xl:block 2xl:hidden'>XL</div>
                        <div class='hidden lg:block xl:hidden'>LG</div>
                        <div class='hidden md:block lg:hidden xl:hidden'>MD</div>
                        <div class='hidden sm:block md:hidden lg:hidden xl:hidden'>SM</div>
                        <div class='sm:hidden md:hidden lg:hidden xl:hidden'>XS</div>
                    </div>
                    <div class='hidden sm:block'>
                        {{ $headerright }}
                    </div>
                    <div class=''>
                        @include('components.lopsoft.sidebar.sidebar-profile')
                    </div>
                </div>
            </div>
        </header>

        <div class="relative flex h-full ">
            <div
                id='sidebar'
                class="sidebar flex h-full bg-gray-800 text-white z-50"
                @click.outside="handleAway()">
                <div class="w-full flex mb-14">
                    <div class="sidebar-wrap w-full h-full items-start justify-start overflow-y-auto nosb mb-14">
                        {{  $sidebar }}
                    </div>
                </div>
            </div>
            <main class="lg:static absolute top-0 left-0 bottom-0 flex flex-col w-full bg-slate-200 overflow-x-hidden overflow-y-auto">
                <div class="flex w-full ">
                    <div class="flex flex-col w-full text-gray-900 text-xl h-screen">
                        {!! $content !!}
                    </div>
                </div>
            </main>
            {{--  <div
                x-show="open && !isWideScreen"
                class="absolute top-0 left-0 bottom-0 right-0 opacity-75 bg-black">
            </div>--}}
        </div>
    </div>

</div>
