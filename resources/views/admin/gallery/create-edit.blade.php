@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Gallery") }}</h2>
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
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.gallery.update', ['gallery' => $data->id]) : route('admin.gallery.store') }}" method="post">
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


