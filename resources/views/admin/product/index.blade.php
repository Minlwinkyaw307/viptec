@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Products") }}</h2>
                <p>{{ __("pagination_detail", ['to' => $products->toArray()['to'], 'from' => $products->toArray()['from'], 'total' => $products->total()]) }}</p>
            </div>
            <div class="table-list-header-input">
                <div class="form-group">
                    <div class="form-element">
                        <button class="button-first focus:outline-none link-button" data-link="{{ route('admin.product.create') }}">{{ __("Create New Item") }}</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-full">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __("Title") }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __("Status") }}</th>
                <th>{{ __("Action") }}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="filters">
                <form action="">
                <td class="filter"></td>
                <td class="filter p-0">
                    <x-admin::text-input
                        name="filter_product_name"
                        :label="null"
                        :value="request()->query('filter_product_name')"
                        id="filter_product_name"
                        :placeholder="__('Please Enter Product Name')"
                        :required="false"
                    ></x-admin::text-input>
                </td>
                <td class="filter p-0">
                    <x-admin::text-input
                        name="filter_created_at"
                        :label="null"
                        type="date"
                        :value="request()->query('filter_created_at')"
                        id="filter_product_name"
                        :required="false"
                    ></x-admin::text-input>
                </td>
                <td class="filter p-0">
                    <x-admin::select-input
                        name="filter_category_id"
                        value="1"
                        :options="$category_options"
                        :label="null"
                        type="date"
                        :value="request()->query('filter_category_id')"
                        id="filter_product_name"
                        :required="false"
                    ></x-admin::select-input>
                </td>
                <td class="filter p-0">
                    <x-admin::select-input
                        name="filter_status_id"
                        value="1"
                        :options="\App\Models\Product::product_statues()"
                        :label="null"
                        :value="request()->query('filter_status_id')"
                        id="filter_product_name"
                        :required="false"
                    ></x-admin::select-input>
                </td>
                <td class="filter p-0">
                    <div class="form-element flex w-full">
                        <button type="reset" class="button-second focus:outline-none">{{ __("Reset") }}</button>
                        <button type="submit" class="button-first focus:outline-none">{{ __("Filter") }}</button>
                    </div>
                </td>
                </form>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{ $product->id }}
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-image"><a class="block" href="javascript:void(0);"><img src="{{ $product->imageUrl }}" alt=""></a></div>
                            <div class="product-box-content"><span class="block">{{ $product->translations[0]->title }}</span>
                            </div>
                        </div>
                    </td>
                    <td>{{ format_default_date($product->created_at) }}</td>
                    <td>{{ $product->category->translations[0]->name }}</td>
                    <td>
                        <div class="badge {{ $product->status['class'] }} flex"><span class="block">{{ $product->status['name']  }}</span></div>
                    </td>
                    <td>
                        <div class="process-buttons flex">
                            <button  class="focus:outline-none link-button" data-link="{{ route('admin.product.edit', ['product' => $product->id]) }}">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </button>
                            <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}" method="post" onsubmit="return confirm('{{__("Are your sure about deleting selected item?")}}')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="focus:outline-none">
                                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->appends(request()->query())->links('partials.pagination') }}
    </div>

@endsection
