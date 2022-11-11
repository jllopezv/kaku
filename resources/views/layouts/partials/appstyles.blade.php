@vite(['resources/css/app.css'])
@vite(['resources/css/all.min.css'])
@vite(['resources/js/libs/freakflags/freakflags.css'])

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>

    [x-cloak] { display: none !important; }

    html
    {
        font-size:   {{ config('lopsoft.font_size') }};    /* Default for aplication */
        font-family: 'Nunito', sans-serif;
    }
    
</style>

@livewireStyles