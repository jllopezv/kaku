<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-user'></i> {{ transup('users') }}" class='font-bold text-red-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('users.index') }}" text="{{ transup('users') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('roles.index') }}" text="{{ transup('roles') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('permissions.index') }}" text="{{ transup('permissions') }}"/>
</x-lopsoft.sidebar.sidebar-group>

<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-table'></i> {{ transup('auxiliaries') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('colors.index') }}" text="{{ transup('colors') }}"/>
</x-lopsoft.sidebar.sidebar-group>



{{--
                <x-lopsoft.sidebar.sidebar-item text='Option_1'/>
                <x-lopsoft.sidebar.sidebar-item text='Option_1'/>

                <x-lopsoft.sidebar.sidebar-text :text="__('users')" class='text-red-500'/>
                <x-lopsoft.sidebar.sidebar-item link='asdf' />
                <x-lopsoft.sidebar.sidebar-item text='Option_1'/>
                <x-lopsoft.sidebar.sidebar-group text='grupo'>
                    <x-lopsoft.sidebar.sidebar-item text='subOption_1'/>
                    <x-lopsoft.sidebar.sidebar-item text='subOption_2'/>
                    <x-lopsoft.sidebar.sidebar-item text='subOption_3'/>
                    <x-lopsoft.sidebar.sidebar-group text='subgrupo4'>
                        <x-lopsoft.sidebar.sidebar-item text='subOption_1' link='testcomp'/>
                        <x-lopsoft.sidebar.sidebar-item text='subOption_2'/>
                        <x-lopsoft.sidebar.sidebar-item text='subOption_3'/>
                    </x-lopsoft.sidebar.sidebar-group>
                </x-lopsoft.sidebar.sidebar-group>
 --}}
