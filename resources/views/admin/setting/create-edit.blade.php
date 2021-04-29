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
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.config.setting.update') : route('admin.config.setting.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset

                    <x-admin::file-input
                        :label="__('Logo')"
                        name="logo"
                        :old="isset($data) ? $data->logoUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

                    <x-admin::file-input
                        :label="__('Favicon')"
                        name="favico"
                        :old="isset($data) ? $data->faviconUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

                    <x-admin::text-input
                        :label="__('Site Title') . ' (' . __('Turkish') . ')'"
                        name="tr_title"
                        :value="old('tr_title') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->title : null"
                        :placeholder="__('Please Enter Site Title')"
                        :error="$errors->first('tr_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Site Title') . ' (' . __('English') . ')'"
                        name="en_title"
                        :value="old('en_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->title : null"
                        :placeholder="__('Please Enter Site Title')"
                        :error="$errors->first('en_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Site Name') . ' (' . __('Turkish') . ')'"
                        name="tr_site_name"
                        :value="old('tr_site_name') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->site_name : null"
                        :placeholder="__('Please Enter Site Name')"
                        :error="$errors->first('tr_site_name') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Site Name') . ' (' . __('English') . ')'"
                        name="en_site_name"
                        :value="old('en_site_name') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->site_name : null"
                        :placeholder="__('Please Enter Site Name')"
                        :error="$errors->first('en_site_name') ?? null"
                    ></x-admin::text-input>


                    <x-admin::text-input
                        :label="__('Site Description') . ' (' . __('Turkish') . ')'"
                        name="tr_description"
                        :value="old('tr_description') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->description : null"
                        :placeholder="__('Please Enter Site Description')"
                        :error="$errors->first('tr_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Site Description') . ' (' . __('English') . ')'"
                        name="en_description"
                        :value="old('en_description') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->description : null"
                        :placeholder="__('Please Enter Site Description')"
                        :error="$errors->first('en_description') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Phone')"
                        name="phone"
                        :value="old('phone') ?? isset($data) ? $data->phone : null"
                        :placeholder="__('Please Enter Phone Number')"
                        :error="$errors->first('phone') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('FAX')"
                        name="fax"
                        :value="old('phone') ?? isset($data) ? $data->fax : null"
                        :placeholder="__('Please Enter FAX Number')"
                        :error="$errors->first('fax') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Email')"
                        name="email"
                        :value="old('email') ?? isset($data) ? $data->email : null"
                        :placeholder="__('Please Enter Email')"
                        :error="$errors->first('email') ?? null"
                        type="email"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Facebook')"
                        name="facebook"
                        :value="old('facebook') ?? isset($data) ? $data->facebook : null"
                        :placeholder="__('Please Enter Facebook Link')"
                        :error="$errors->first('facebook') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('LinkedIn')"
                        name="linkedin"
                        :value="old('linkedin') ?? isset($data) ? $data->linkedin : null"
                        :placeholder="__('Please Enter LinkedIn Link')"
                        :error="$errors->first('linkedin') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Instagram')"
                        name="instagram"
                        :value="old('instagram') ?? isset($data) ? $data->instagram : null"
                        :placeholder="__('Please Enter Instagram Link')"
                        :error="$errors->first('instagram') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('YouTube')"
                        name="youtube"
                        :value="old('youtube') ?? isset($data) ? $data->instagram : null"
                        :placeholder="__('Please Enter YouTube Link')"
                        :error="$errors->first('youtube') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('YouTube Tutorial Link')"
                        name="tutorial_link"
                        :value="old('tutorial_link') ?? isset($data) ? $data->tutorial_link : null"
                        :placeholder="__('Please Enter YouTube Tutorial Link')"
                        :error="$errors->first('tutorial_link') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Location')"
                        name="location"
                        :value="old('location') ?? isset($data) ? $data->location : null"
                        :placeholder="__('Please Enter Location')"
                        :error="$errors->first('location') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Address')"
                        name="address"
                        :value="old('address') ?? isset($data) ? $data->address : null"
                        :placeholder="__('Please Enter Address')"
                        :error="$errors->first('address') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::file-input
                        :label="__('Catalogue')"
                        name="catalogue_link"
                        :old="isset($data) ? $data->logoUrl : null"
                        :required="isset($data) ? false : true"
                        :previewable="false"
                    >
                        <a href="{{ $data->catalogueFileUrl }}">{{ __("Open") }}</a>
                    </x-admin::file-input>

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
