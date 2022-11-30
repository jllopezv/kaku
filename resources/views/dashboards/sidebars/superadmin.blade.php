<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />
<x-lopsoft.sidebar.sidebar-item link="{{ route('dashboard') }}" text="<i class='fa fa-home fa-fw pr-1'></i> HOME" class='font-bold text-green-300' />

{{-- AUDITS 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-rectangle-list fa-fw'></i> {{ transup('audit') }}" class='font-bold text-indigo-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('audits.index') }}" text="{{ transup('audit') }}"/>
</x-lopsoft.sidebar.sidebar-group>--}}

{{-- SETTINGS 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-sliders fa-fw'></i> {{ transup('settings') }}" class='font-bold text-blue-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('config.show') }}" text="{{ transup('config') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('appsettings.index') }}" text="{{ transup('appsettings') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('appsetting_pages.index') }}" text="{{ transup('appsettingpages') }}"/>
</x-lopsoft.sidebar.sidebar-group>--}}

{{-- USERS --}}
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-user fa-fw'></i> {{ transup('users') }}" class='font-bold text-red-300'>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('users.index') }}" text="{{ transup('users') }}"/>
    {{-- <x-lopsoft.sidebar.sidebar-item link="{{ route('roles.index') }}" text="{{ transup('roles') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('permissions.index') }}" text="{{ transup('permissions') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('permission_groups.index') }}" text="{{ transup('tables.permission_groups') }}"/>--}}
</x-lopsoft.sidebar.sidebar-group>

{{-- WEBSITE 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-globe fa-fw'></i> {{ transup('website') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_items.index') }}" text="{{ transup('short_website_items') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_item_types.index') }}" text="{{ transup('short_website_item_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_tags.index') }}" text="{{ transup('short_website_tags') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_posts.index') }}" text="{{ transup('short_website_posts') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_post_categories.index') }}" text="{{ transup('short_website_post_categories') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_menus.index') }}" text="{{ transup('short_website_menus') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_textslider_groups.index') }}" text="{{ transup('short_website_textslider_groups') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('website_textsliders.index') }}" text="{{ transup('short_website_textsliders') }}"/>
</x-lopsoft.sidebar.sidebar-group>--}}

{{-- CONDOS 
@if(isModuleActive('condos'))
    <x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-building fa-fw'></i> {{ transup('condos') }}" class='font-bold '>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condobuildings.index') }}" text="{{ transup('tables.buildings') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condoproperties.index') }}" text="{{ transup('tables.properties') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condoowners.index') }}" text="{{ transup('tables.condoowners') }}"/>
        <x-lopsoft.sidebar.sidebar-item link="{{ route('condotenants.index') }}" text="{{ transup('tables.condotenants') }}"/>
    </x-lopsoft.sidebar.sidebar-group>
@endif--}}

{{-- CRM 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-bank fa-fw'></i> {{ transup('billing_action') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condos.invoices.index') }}" text="{{ transup('tables.invoices') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('condos.invoice_collects.index') }}" text="{{ transup('tables.invoice_collects') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('invoice_categories.index') }}" text="{{ transup('tables.invoice_categories') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('invoice_templates.index') }}" text="{{ transup('tables.invoices_templates') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('payment_types.index') }}" text="{{ transup('tables.payment_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('taxes.index') }}" text="{{ transup('tables.taxes') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('banks.index') }}" text="{{ transup('tables.banks') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('bank_accounts.index') }}" text="{{ transup('tables.bank_accounts') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('movements.index') }}" text="{{ transup('tables.movements') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('customers.index') }}" text="{{ transup('tables.customers') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('customer_categories.index') }}" text="{{ transup('tables.customer_categories') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('customer_types.index') }}" text="{{ transup('tables.customer_types') }}"/>
    
</x-lopsoft.sidebar.sidebar-group>--}}

{{-- AUX 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-table fa-fw'></i> {{ transup('auxiliaries') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('colors.index') }}" text="{{ transup('colors') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('currencies.index') }}" text="{{ transup('currencies') }}"/>
</x-lopsoft.sidebar.sidebar-group>--}}

{{-- SIPRED 
<x-lopsoft.sidebar.sidebar-group text="<i class='fa fa-table fa-fw'></i> {{ transup('sipred') }}" class='font-bold '>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('issue_types.index') }}" text="{{ transup('issue_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('issues.index') }}" text="{{ transup('issues') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('employee_types.index') }}" text="{{ transup('employee_types') }}"/>
    <x-lopsoft.sidebar.sidebar-item link="{{ route('employees.index') }}" text="{{ transup('employees') }}"/>
</x-lopsoft.sidebar.sidebar-group>--}}

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

