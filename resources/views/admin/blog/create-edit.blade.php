@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Blog") }}</h2>
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
                <form enctype="multipart/form-data" action="{{ isset($data) ? route('admin.blog.update', ['blog' => $data->id]) : route('admin.blog.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset

                    <x-admin::file-input
                        :label="__('Thumbnail')"
                        name="thumbnail"
                        :old="isset($data) ? $data->thumbnailUrl : null"
                        :required="isset($data) ? false : true"
                    ></x-admin::file-input>

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
                        :placeholder="__('Please Enter Blog Title')"
                        :error="$errors->first('tr_title') ?? null"
                    ></x-admin::text-input>
                    <x-admin::text-input
                        :label="__('Title') . ' (' . __('English') . ')'"
                        name="en_title"
                        :value="old('en_title') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->title : null"
                        :placeholder="__('Please Enter Blog Title')"
                        :error="$errors->first('en_title') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Content') . ' (' . __('Turkish') . ')'"
                        name="tr_content"
                        :value="old('tr_content') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->content : null"
                        :placeholder="__('Please Enter Blog Content')"
                        :error="$errors->first('tr_content') ?? null"
                        :textarea="true"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Content') . ' (' . __('English') . ')'"
                        name="en_content"
                        :value="old('en_content') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->content : null"
                        :placeholder="__('Please Enter Blog Content')"
                        :error="$errors->first('en_content') ?? null"
                        :textarea="true"
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

@section('bb-javascript')
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tr_content');
        CKEDITOR.replace('en_content');
    </script>
@endsection


