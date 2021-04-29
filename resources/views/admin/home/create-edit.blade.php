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
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.config.home.update') : route('admin.config.home.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset

                    <x-admin::file-input
                        :label="__('About Image')"
                        name="about_image"
                        :old="isset($data) ? $data->aboutImageUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

                    <x-admin::file-input
                        :label="__('Quota Background Image')"
                        name="quota_background"
                        :old="isset($data) ? $data->quotaBackgroundUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

                    <x-admin::text-input
                        :label="__('About Title') . ' (' . __('Turkish') . ')'"
                        name="tr_about_title"
                        :value="old('tr_about_title') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->about_title : null"
                        :placeholder="__('Please Enter About Title')"
                        :error="$errors->first('tr_about_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('About Title') . ' (' . __('English') . ')'"
                        name="en_about_title"
                        :value="old('en_about_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->about_title : null"
                        :placeholder="__('Please Enter About Title')"
                        :error="$errors->first('en_about_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('About Description') . ' (' . __('Turkish') . ')'"
                        name="tr_about_description"
                        :value="old('tr_about_description') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->about_description : null"
                        :placeholder="__('Please Enter About Description')"
                        :error="$errors->first('tr_about_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('About Description') . ' (' . __('English') . ')'"
                        name="en_about_description"
                        :value="old('en_about_description') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->about_description : null"
                        :placeholder="__('Please Enter About Description')"
                        :error="$errors->first('en_about_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>




                    <x-admin::text-input
                        :label="__('Quota Title') . ' (' . __('Turkish') . ')'"
                        name="tr_quota_title"
                        :value="old('tr_quota_title') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->quota_title : null"
                        :placeholder="__('Please Enter Quota Title')"
                        :error="$errors->first('tr_quota_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Quota Title') . ' (' . __('English') . ')'"
                        name="en_quota_title"
                        :value="old('en_quota_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->quota_title : null"
                        :placeholder="__('Please Enter Quota Title')"
                        :error="$errors->first('en_quota_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Quota Description') . ' (' . __('Turkish') . ')'"
                        name="tr_quota_description"
                        :value="old('tr_quota_description') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->quota_description : null"
                        :placeholder="__('Please Enter Quota Description')"
                        :error="$errors->first('tr_quota_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('About Description') . ' (' . __('English') . ')'"
                        name="en_quota_description"
                        :value="old('en_quota_description') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->description : null"
                        :placeholder="__('Please Enter Quota Description')"
                        :error="$errors->first('en_quota_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>




                    <x-admin::text-input
                        :label="__('News Letter Title') . ' (' . __('Turkish') . ')'"
                        name="tr_subscribe_title"
                        :value="old('tr_subscribe_title') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->subscribe_title : null"
                        :placeholder="__('Please Enter News Letter Title')"
                        :error="$errors->first('tr_subscribe_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('News Letter Title') . ' (' . __('English') . ')'"
                        name="en_subscribe_title"
                        :value="old('en_subscribe_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->subscribe_title : null"
                        :placeholder="__('Please Enter News Letter Title')"
                        :error="$errors->first('en_subscribe_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('News Letter Description') . ' (' . __('Turkish') . ')'"
                        name="tr_subscribe_description"
                        :value="old('tr_subscribe_description') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->quota_description : null"
                        :placeholder="__('Please Enter News Letter Description')"
                        :error="$errors->first('tr_subscribe_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('News Letter Description') . ' (' . __('English') . ')'"
                        name="en_subscribe_description"
                        :value="old('en_subscribe_description') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->quota_description : null"
                        :placeholder="__('Please Enter News Letter Description')"
                        :error="$errors->first('en_subscribe_description') ?? null"
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
        CKEDITOR.replace('tr_about_description');
        CKEDITOR.replace('en_about_description');
    </script>
@endsection


