<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-user'></i> {{ transup('condos') }}" class='font-bold text-red-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condobuildings.index') }}" text="{{ transup('tables.buildings') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condoproperties.index') }}" text="{{ transup('tables.properties') }}"/>
</x-lopsoft.sidebar.sidebar-group>
