@extends('admin.layouts.base')


@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Dashboard") }}</h2>
            </div>
        </div>
        <div class="general-info my-6 mx-3">
            <ul class="flex">
                <li class="w-1/4">
                    <div class="general-info-box">
                        <small class="block text-center">{{ __("Daily Visitors") }}</small>
                        <span class="block text-center">{{ $today_visitor_count }}</span>
                    </div>
                </li>
                <li class="w-1/4">
                    <div class="general-info-box">
                        <small class="block text-center">{{ __("Total Visitors") }}</small>
                        <span class="block text-center">{{ $total_visitors }}</span>
                    </div>
                </li>
                <li class="w-1/4">
                    <div class="general-info-box">
                        <small class="block text-center">{{ __("No of Products") }}</small>
                        <span class="block text-center">{{ $no_of_products }}</span>
                    </div>
                </li>
                <li class="w-1/4">
                    <div class="general-info-box">
                        <small class="block text-center">{{ __("No of Blogs") }}</small>
                        <span class="block text-center">{{ $no_of_blogs }}</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="w-full flex">
            <div class="w-full px-2 mb-6" style="height: 300px;">
                <h2 class="text-center">{{ __("Most Visited Pages") }}</h2>
                <canvas id="most_visited_page" width="400" height="400" ></canvas>
            </div>
        </div>
        <div class="w-full flex">
            <div class="w-1/2 h-500px px-2 mb-6"  style="height: 300px;">
                <h2 class="text-center">{{ __("Visitors Last 2 Weeks(Not GA)") }}</h2>
                <canvas id="my_custom_visitor" width="400" height="400" ></canvas>
            </div>
            <div class="w-1/2 h-500px px-2 mb-6"  style="height: 300px;">
                <h2 class="text-center">{{ __("Browser Used By Users") }}</h2>
                <canvas id="browser_types" width="400" height="400"></canvas>
            </div>
        </div>

        <div class="box mt-6 mx-3">
            <h1 class="text-2xl font-bold py-5">{{ __("Product With Most Views") }}</h1>
            <ul class="flex content-center">
                @foreach($top_products as $product)
                <li class="w-1/3">
                    <div class="box-list">
                        <div class="box-list-image"><a class="block" href="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                                <img src="{{ $product->imageUrl }}" alt=""></a></div>
                        <div class="box-list-content flex flex-col">
                            <div class="box-list-content-in"><span class="block">{{ __("Product") }}</span>
                                <h1><a class="block" href="javascript:void(0);">{{ $product->translations[0]->title }}</a></h1>
                                <p>{{ \Illuminate\Support\Str::limit($product->translations[0]->description, 60) }}</p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="box mt-6 mx-3">
            <h1 class="text-2xl font-bold py-5">{{ __("Blog With Most Views") }}</h1>
            <ul class="flex content-center">
                @foreach($top_blogs as $blog)
                    <li class="w-1/3">
                        <div class="box-list">
                            <div class="box-list-image"><a class="block" href="{{ route('admin.blog.edit', ['blog' => $blog->id]) }}">
                                    <img src="{{ $blog->thumbnailUrl }}" alt=""></a></div>
                            <div class="box-list-content flex flex-col">
                                <div class="box-list-content-in"><span class="block">{{ __("Blog") }}</span>
                                    <h1><a class="block" href="javascript:void(0);">{{ $product->translations[0]->title }}</a></h1>
                                    <p>{!! \Illuminate\Support\Str::limit(strip_tags(addslashes($blog->translations[0]->content), 50)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('bb-javascript')


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
        <script>
        let ctx = document.getElementById('my_custom_visitor').getContext('2d');
        let bTypes = document.getElementById('browser_types').getContext('2d');
        let mostVisitedPages = document.getElementById('most_visited_page').getContext('2d');
        mostVisitedPages.height = 200;
        let mostVisitedPagesChart = new Chart(mostVisitedPages, {
            type: 'bar',
            data: {
                labels: JSON.parse('{!! json_encode($most_visited_web_pages['title']) !!}'),
                datasets: [{
                    label: '{{ __("Most Visited Web Pages") }}',
                    data: JSON.parse('{!! json_encode($most_visited_web_pages['pageViews']) !!}'),
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86,)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        let bTypesChart = new Chart(bTypes, {
            type: 'pie',
            data: {
                labels: JSON.parse('{!! json_encode($top_browsers['browser']) !!}'),
                datasets: [{
                    label: '{{ __("# of Visitors") }}',
                    data: JSON.parse('{!! json_encode($top_browsers['total']) !!}'),
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86,)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        let myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: JSON.parse('{!! json_encode($daily_visitor['dates']) !!}'),
                datasets: [{
                    label: '{{ __("# of Visitors") }}',
                    data: JSON.parse('{!! json_encode($daily_visitor['visitors']) !!}'),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endsection
