<div x-cloak x-data='{showProfile: false}' @click='showProfile=!showProfile' class='relative  cursor-pointer'>
    {{--<x-lopsoft.avatars.avatar-xl avatar="{{ getImage(auth()->user()->avatar, 'lopsoft.default_avatar') }}" class='border-white border-2' />--}}
    <div
    x-show='showProfile' x-transition.opacity
        @click.away='showProfile=false'
        class='z-50 absolute top-14 right-0 bg-slate-800 text-slate-400 whitespace-nowrap p-2 w-64 shadow-lg cursor-default rounded-lg'>
        <div class='p-1 border-b border-slate-700'>
            <div class='font-bold'>
                {{--{{ auth()->user()->name }}--}}
            </div>
            <div class=' text-slate-400'>
                {{--{{ auth()->user()->email }}--}}
            </div>
            <div class='  flex items-center justify-between'>
                <div class='font-bold text-green-300'>
                    {{--{{ auth()->user()->getSessionRole()->role??'' }}--}}
                </div>
            </div>
        </div>
        <div class='px-1 py-2'>
            <div class='text-sm  hover:text-white cursor-pointer py-1'>
                {{--<a href="{{ route('users.edit', [ 'id' => auth()->user()->id ]) }}">--}}
                    <div class='flex items-center justify-start'>
                        <div class='mr-1'>
                            <i class='fa fa-address-card'></i>
                        </div>
                        <div class=''>
                            {{ transup('change_profile') }}
                        </div>
                    </div>
                {{--</a>--}}
            </div>
            <div class='text-sm  hover:text-white cursor-pointer py-1'>
                {{--<a href="{{ route('about.system') }}">--}}
                    <div class='flex items-center justify-start'>
                        <div class='mr-1'>
                            <i class='fa fa-circle-question text-blue-400'></i>
                        </div>
                        <div class=''>
                            {{ transup('about_system') }}
                        </div>
                    </div>
                {{--</a>--}}
            </div>
        </div>
        <div class='p-1 text-sm  hover:text-red-400 cursor-pointer border-t border-slate-700'>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a onclick="this.closest('form').submit();">
                    <i class='fa fa-sign-out text-red-400'></i> {{ transup('logout') }}
                </a>
            </form>
        </div>
    </div>
</div>

