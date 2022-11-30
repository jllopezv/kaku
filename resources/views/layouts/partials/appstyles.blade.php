@vite(['resources/css/app.css'])
@vite(['resources/js/libs/freakflags/freakflags.css'])
@vite(['resources/css/common.css'])
<link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>

    [x-cloak] { display: none !important; }

    body
    {
        font-size:   {{ config('lopsoft.font_size') }};    /* Default for aplication */
        font-family: 'Nunito', sans-serif;
    }
    
</style>

@livewireStyles