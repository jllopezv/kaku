<div class='w-full flex flex-wrap items-start justify-start p-1'>
    <div class='w-full sm:w-1/2 md:w-1/3 p-2 h-40 mb-4'>
        <div class='h-40 relative bg-slate-700 p-2 overflow-hidden'>
            <div class='absolute top-0 right-0 w-full h-full flex items-center justify-end p-2'>
                <i class='fa fa-house-chimney fa-6x text-slate-600'></i>
            </div>
            <div class='absolute top-6 left-4 text-white'>
                <div class='text-5xl font-bold'>
                    {{ \App\Models\Condos\Condoproperty::count() }}
                </div>
                <div class='text-xs sm:text-2xl fond-bold'>
                    {{ transup('properties')}}
                </div>
            </div>

        </div>
    </div>
    <div class='w-full sm:w-1/2 md:w-1/3 p-2 h-40 mb-4'>
        <div class='h-40 relative bg-slate-700 p-2 overflow-hidden'>
            <div class='absolute top-0 right-0 w-full h-full flex items-center justify-end p-2'>
                <i class='fa fa-house-chimney fa-6x text-slate-600'></i>
            </div>
            <div class='absolute top-6 left-4 text-white'>
                <div class='text-5xl font-bold'>

                    {{ \App\Models\Condos\Condoproperty::with('condotenants')->count() }}
                </div>
                <div class='text-xs sm:text-2xl fond-bold'>
                    {{ transup('tenants')}}
                </div>
            </div>

        </div>
    </div>
    <div class='w-full sm:w-1/2 md:w-1/3 p-2 h-40 mb-4'>
        <div class='h-40 relative bg-slate-700 p-2 overflow-hidden'>
            <div class='absolute top-0 right-0 w-full h-full flex items-center justify-end p-2'>
                <i class='fa fa-house-chimney fa-6x text-slate-600'></i>
            </div>
            <div class='absolute top-6 left-4 text-white'>
                <div class='text-5xl font-bold'>
                    {{ \App\Models\Condos\Condoproperty::count() }}
                </div>
                <div class='text-xs sm:text-2xl fond-bold'>
                    {{ transup('properties')}}
                </div>
            </div>
        </div>
    </div>

    <div id="graph1" class='bg-pink-200' style="width:100%; height:400px;"></div>


</div>

@push('scripts')

    <script src="{{ asset('js/libs/highcharts/highcharts.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chart = Highcharts.chart('graph1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Fruit Consumption'
                },
                xAxis: {
                    categories: ['Apples', 'Bananas', 'Oranges']
                },
                yAxis: {
                    title: {
                        text: 'Fruit eaten'
                    }
                },
                series: [{
                    name: 'Jane',
                    data: [1, 0, 4,2,3,4,1,2,3,4,4]
                }, {
                    name: 'John',
                    data: [5, 7, 3,4,1,2,3,4,4,0,2]
                }]
            });
        });
    </script>
@endpush
