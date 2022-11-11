@props([
    'minheight' =>  '500px',
])

<div x-init='showOption[1]=true'
    class='pb-4 mt-4 border border-gray-300 rounded-lg bg-gray-100' style="min-height: {{$minheight}}">
    <div class='flex flex-wrap items-center justify-start p-2 border-gray-300 bg-gray-200 rounded-tr-md rounded-tl-md text-base'>
        {!! $tabs !!}
    </div>
    <div class='h-full px-1 md:px-3'>
        {!! $tabscontent !!}
    </div>
</div>
