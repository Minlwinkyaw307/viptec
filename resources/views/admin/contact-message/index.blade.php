@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Contact Messages") }}</h2>
                <p>{{ __("pagination_detail", ['to' => $data->toArray()['to'], 'from' => $data->toArray()['from'], 'total' => $data->total()]) }}</p>
            </div>
        </div>
        <table class="w-full">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __("Name") }}</th>
                <th>{{ __("Surname") }}</th>
                <th>{{ __("Email") }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __("Action") }}</th>
            </tr>
            </thead>
            <tbody>
            <tr class="filters">
                <form action="">
                    <td class="filter"></td>
                    <td class="filter">
                        <x-admin::text-input
                            name="filter_name"
                            :label="null"
                            :value="request()->query('filter_name')"
                            id="filter_name"
                            :placeholder="__('Please Enter Name')"
                            :required="false"
                        ></x-admin::text-input>
                    </td>
                    <td class="filter">
                        <x-admin::text-input
                            name="filter_surname"
                            :label="null"
                            :value="request()->query('filter_surname')"
                            id="filter_surname"
                            :placeholder="__('Please Enter Surname')"
                            :required="false"
                        ></x-admin::text-input>
                    </td>
                    <td class="filter">
                        <x-admin::text-input
                            name="filter_email"
                            :label="null"
                            :value="request()->query('filter_email')"
                            id="filter_email"
                            :placeholder="__('Please Enter Email')"
                            :required="false"
                        ></x-admin::text-input>
                    </td>
                    <td class="filter">
                        <x-admin::text-input
                            name="filter_created_at"
                            :label="null"
                            type="date"
                            :value="request()->query('filter_created_at')"
                            id="filter_created_at"
                            :required="false"
                        ></x-admin::text-input>
                    </td>
                    <td class="filter">
                        <div class="form-element flex w-full">
                            <button type="reset" class="button-second focus:outline-none">{{ __("Reset") }}</button>
                            <button type="submit" class="button-first focus:outline-none">{{ __("Filter") }}</button>
                        </div>
                    </td>
                </form>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td>
                        {{ $row->id }}
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-content"><span class="block">{{ $row->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-content"><span class="block">{{ $row->surname }}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="product-box flex items-center">
                            <div class="product-box-content"><span class="block"><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></span>
                            </div>
                        </div>
                    </td>
                    <td>{{ format_default_date($row->created_at) }}</td>
                    <td>
                        <div class="process-buttons flex">
                            <button  class="focus:outline-none link-button" data-link="{{ route('admin.contact-message.show', ['contact_message' => $row->id]) }}">
                                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $data->appends(request()->query())->links('partials.pagination') }}
    </div>

@endsection
