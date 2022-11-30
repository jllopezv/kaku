<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />

{{-- SETTINGS --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-sliders fa-fw'></i> {{ transup('settings') }}" class='font-bold text-blue-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('config.show') }}" text="{{ transup('config') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('appsettings.index') }}" text="{{ transup('appsettings') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('appsetting_pages.index') }}" text="{{ transup('appsettingpages') }}"/>
</x-lopsoft.sidebar.sidebar-group>

{{-- USERS --}}
@hasAbilityOr(['users.access', 'roles.access', 'permissions.access', 'permission_groups.access'])
    <x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-user fa-fw'></i> {{ transup('users') }}" class='font-bold text-red-300'>
        @hasAbility('users.index')<x-lopsoft.sidebar.sidebar-item link="{{ route('users.index') }}" text="{{ transup('users') }}"/>@endhasAbility
        @hasAbility('roles.index')<x-lopsoft.sidebar.sidebar-item link="{{ route('roles.index') }}" text="{{ transup('roles') }}"/>@endhasAbility
        @hasAbility('permissions.index')<x-lopsoft.sidebar.sidebar-item link="{{ route('permissions.index') }}" text="{{ transup('permissions') }}"/>@endhasAbility
        @hasAbility('permission_groups.index')<x-lopsoft.sidebar.sidebar-item link="{{ route('permission_groups.index') }}" text="{{ transup('tables.permission_groups') }}"/>@endhasAbility
    </x-lopsoft.sidebar.sidebar-group>
@endhasAbilityOr

{{-- WEBSITE --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-globe fa-fw'></i> {{ transup('website') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_items.index') }}" text="{{ transup('short_website_items') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_item_types.index') }}" text="{{ transup('short_website_item_types') }}"/>
</x-lopsoft.sidebar.sidebar-group>

{{-- CONDOS --}}
<x-lopsoft.sidebar.sidebar-item link='{{ route('dashboard') }}' text='home'/>
@if(isModuleActive('condos'))
    <x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-building fa-fw'></i> {{ transup('condos') }}" class='font-bold '>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condobuildings.index') }}" text="{{ transup('tables.buildings') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condoproperties.index') }}" text="{{ transup('tables.properties') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condoowners.index') }}" text="{{ transup('tables.condoowners') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condotenants.index') }}" text="{{ transup('tables.condotenants') }}"/>
    </x-lopsoft.sidebar.sidebar-group>
@endif

{{-- CRM --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-bank fa-fw'></i> {{ transup('billing_action') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condos.invoices.index') }}" text="{{ transup('tables.invoices') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('invoice_templates.index') }}" text="{{ transup('tables.invoices_templates') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('payment_types.index') }}" text="{{ transup('tables.payment_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('taxes.index') }}" text="{{ transup('tables.taxes') }}"/>
</x-lopsoft.sidebar.sidebar-group>

{{-- POS --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-bank fa-fw'></i> {{ transup('billing_action') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condos.invoices.index') }}" text="{{ transup('tables.invoices') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('invoice_templates.index') }}" text="{{ transup('tables.invoices_templates') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('payment_types.index') }}" text="{{ transup('tables.payment_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('taxes.index') }}" text="{{ transup('tables.taxes') }}"/>
</x-lopsoft.sidebar.sidebar-group>

{{-- AUX --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-table fa-fw'></i> {{ transup('auxiliaries') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('colors.index') }}" text="{{ transup('colors') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('currencies.index') }}" text="{{ transup('currencies') }}"/>
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
