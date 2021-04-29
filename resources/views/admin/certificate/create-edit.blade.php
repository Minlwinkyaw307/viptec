@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Certificate") }}</h2>
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
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.certificate.update', ['certificate' => $data->id]) : route('admin.certificate.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset

                    <x-admin::file-input
                        :label="__('Image')"
                        name="image"
                        :old="isset($data) ? $data->imageUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

                    <x-admin::text-input
                        :label="__('Title') . ' (' . __('Turkish') . ')'"
                        name="tr_title"
                        :value="old('tr_title') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->title : null"
                        :placeholder="__('Please Enter Certificate Title')"
                        :error="$errors->first('tr_title') ?? null"
                    ></x-admin::text-input>
                    <x-admin::text-input
                        :label="__('Title') . ' (' . __('English') . ')'"
                        name="en_title"
                        :value="old('en_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->title : null"
                        :placeholder="__('Please Enter Certificate Title')"
                        :error="$errors->first('en_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::select-input
                        :label="__('Active?')"
                        name="visible"
                        :options="[__('No'), __('Yes')]"
                        :value="old('visible') ?? isset($data) ? $data->visible : true"
                        id="visible"
                        :required="true"
                    ></x-admin::select-input>
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


