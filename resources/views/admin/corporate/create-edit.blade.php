@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Home Page Setting") }}</h2>
            </div>
            <div class="table-list-header-input">
                <div class="form-group">
                    <div class="form-element">
                        <button class="button-error focus:outline-none link-button"
                                data-link="{{ url()->previous() }}">{{ __("Back") }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-between mx-auto">
            <div class="w-1/6"></div>
            <div class="w-4/6">
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.config.corporate.update') : route('admin.config.home.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset

                    <x-admin::text-input
                        :label="__('Vision') . ' (' . __('Turkish') . ')'"
                        name="tr_vision"
                        :value="old('tr_vision') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->vision : null"
                        :placeholder="__('Please Enter Vision Description')"
                        :error="$errors->first('tr_vision') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Vision') . ' (' . __('English') . ')'"
                        name="en_vision"
                        :value="old('en_vision') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->vision : null"
                        :placeholder="__('Please Enter Vision Description')"
                        :error="$errors->first('en_vision') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>


                    <div class="form-element float-right">
                        <button type="submit"
                                class="button-first"
                        >{{ __(isset($data) ? "Update" : "Save") }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-1/6"></div>
        </div>
    </div>
@endsection

@section('bb-javascript')
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tr_vision');
        CKEDITOR.replace('en_vision');
    </script>
@endsection


