@extends('layouts.blank')

@section('content')

    <div class='w-full h-screen'>
        <div class='w-full flex items-center justify-center h-full'>
            <div class=''>
                <div class="text-white text-6xl font-bold"><span class='text-green-200'>W</span>ELCOME <span class='text-green-200'>P</span>AGE</div>
                <div class='w-full flex items-center justify-between mt-2'>
                    <div class="text-white text-4xl font-bold">
                        <a class='hover:text-green-200' href='login'>LOGIN</a>
                    </div>
                    <div class="text-white text-4xl font-bold">
                        <a class='hover:text-green-200' href='logout'>LOGOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection