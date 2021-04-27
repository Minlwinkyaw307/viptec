@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Products") }}</h2>
            </div>
            <div class="table-list-header-input">
                <div class="form-group">
                    <div class="form-element">
                        <button class="button-first focus:outline-none link-button" data-link="{{ route('admin.product.create') }}">{{ __("Create New Item") }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-between mx-auto">
            <div class="tabs border-0 w-full">
                <div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
                    <div class="tabs-nav w-full">
                        <ul class="flex relative ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header ui-sortable" role="tablist">
                            <li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active ui-sortable-handle" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a class="flex items-center ui-tabs-anchor" href="#tabs-1" role="presentation" tabindex="-1" id="ui-id-1">
                                    {{ __("Product Information") }}</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-sortable-handle" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a class="flex items-center ui-tabs-anchor" href="#tabs-2" role="presentation" tabindex="-1" id="ui-id-2">
                                    {{ __("Images") }}</a></li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-sortable-handle" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a class="flex items-center ui-tabs-anchor" href="#tabs-3" role="presentation" tabindex="-1" id="ui-id-3">
                                {{ __("Features") }}</a></li>
                        </ul>
                    </div>
                    <form action="{{ route('admin.product.store') }}" method="post">
                        @csrf
                    <div class="tabs-content">
                        <div id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content w-full" aria-hidden="false">
                            <div class="w-full flex flex-row items-center justify-between">
                                <div class="w-1/6"></div>
{{--                                <div class="w-4/6">--}}
{{--                                    <x-admin::file-input--}}
{{--                                        :label="__('Image')"--}}
{{--                                        name="visible"--}}
{{--                                        :old="null"--}}
{{--                                    ></x-admin::file-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Code')"--}}
{{--                                        name="code"--}}
{{--                                        :value="old('code')"--}}
{{--                                        :placeholder="__('Please Enter Product Code')"--}}
{{--                                        :error="$errors->first('code') ?? null"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::select-input--}}
{{--                                        name="category_id"--}}
{{--                                        value="old('category_id')"--}}
{{--                                        :options="$category_options"--}}
{{--                                        :label="__('Category')"--}}
{{--                                        id="category_id"--}}
{{--                                    ></x-admin::select-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Name') . ' (' . __('Turkish') . ')'"--}}
{{--                                        name="tr_name"--}}
{{--                                        :value="old('tr_name')"--}}
{{--                                        :placeholder="__('Please Enter Product Name')"--}}
{{--                                        :error="$errors->first('tr_name') ?? null"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Name') . ' (' . __('English') . ')'"--}}
{{--                                        name="en_english"--}}
{{--                                        :value="old('en_name')"--}}
{{--                                        :placeholder="__('Please Enter Product Name')"--}}
{{--                                        :error="$errors->first('en_name') ?? null"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Description') . ' (' . __('Turkish') . ')'"--}}
{{--                                        name="tr_description"--}}
{{--                                        :value="old('tr_description')"--}}
{{--                                        :placeholder="__('Please Enter Product Description')"--}}
{{--                                        :error="$errors->first('tr_description') ?? null"--}}
{{--                                        :textarea="true"--}}
{{--                                        :rows="5"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Description') . ' (' . __('English') . ')'"--}}
{{--                                        name="tr_description"--}}
{{--                                        :value="old('tr_description')"--}}
{{--                                        :placeholder="__('Please Enter Product Description')"--}}
{{--                                        :error="$errors->first('tr_description') ?? null"--}}
{{--                                        :textarea="true"--}}
{{--                                        :rows="5"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Length') . ' (mm)'"--}}
{{--                                        name="length"--}}
{{--                                        :value="old('length')"--}}
{{--                                        :placeholder="__('Please Enter Product Length')"--}}
{{--                                        :error="$errors->first('length') ?? null"--}}
{{--                                        type="number"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Width') . ' (mm)'"--}}
{{--                                        name="width"--}}
{{--                                        :value="old('width')"--}}
{{--                                        :placeholder="__('Please Enter Product Width')"--}}
{{--                                        :error="$errors->first('width') ?? null"--}}
{{--                                        type="number"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::text-input--}}
{{--                                        :label="__('Thickness') . ' (mm)'"--}}
{{--                                        name="thickness"--}}
{{--                                        :value="old('thickness')"--}}
{{--                                        :placeholder="__('Please Enter Product Thickness')"--}}
{{--                                        :error="$errors->first('thickness') ?? null"--}}
{{--                                        type="number"--}}
{{--                                        :required="false"--}}
{{--                                    ></x-admin::text-input>--}}

{{--                                    <x-admin::select-input--}}
{{--                                        :label="__('Active?')"--}}
{{--                                        name="visible"--}}
{{--                                        :options="[__('No'), __('Yes')]"--}}
{{--                                        :value="old('visible')"--}}
{{--                                        id="visible"--}}
{{--                                        :required="true"--}}
{{--                                    ></x-admin::select-input>--}}
{{--                                </div>--}}
                                <div class="w-1/6"></div>

                            </div>
                        </div>
                        <div id="tabs-2" aria-labelledby="ui-id-2" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <div class="w-full flex flex-row items-center justify-between">
                                <div class="w-1/6"></div>
                                <div class="w-4/6" id="image-wrapper">
                                    <div class="form-element">
                                        <button type="button" onclick="addImageAndThumbnailElements()" class="button-first focus:outline-none" data-link="">Create New Item</button>
                                    </div>

                                    <div id="image-wrapper-1">
                                        <x-admin::file-input
                                            :label="__('Thumbnail')"
                                            name="thumbnails[]"
                                            :old="null"
                                            :required="true"
                                        ></x-admin::file-input>
                                        <x-admin::file-input
                                            :label="__('Image')"
                                            name="images[]"
                                            :old="null"
                                            :required="true"
                                        ></x-admin::file-input>

                                        <div class="form-element">
                                            <button type="button"
                                                    data-link="{{ route('admin.product.destroy', ['product' => 1]) }}"
                                                    data-csrf="{{ csrf_token() }}"
                                                    data-id="1"
                                                class="button-error focus:outline-none delete-product-image-btn">Create New Item</button>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="w-1/6"></div>
                            </div>
                        </div>
                        <div id="tabs-3" aria-labelledby="ui-id-3" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;">
                            <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p><span class="block">Lorem ipsum dolor sit amet consectetur</span>
                            <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p>
                            <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus. Nullam vel lorem placerat, tempus ipsum in, tincidunt mi. Nullam semper turpis nec laoreet vulputate.</p><span class="block">Lorem ipsum dolor sit amet consectetur</span>
                            <p>Mauris aliquam justo ac tortor posuere, eu faucibus est euismod. Sed erat quis sollicitudin. Vivamus tempus mollis felis at sagittis. Ut convallis malesuada mauris, nec ullamcorper magna vulputate id. Sed ullamcorper commodo tellus, sit amet semper sem dignissim non. Nam aliquet est at orci lobortis ullamcorper. Vivamus ultricies rutrum libero consequat varius. Duis quis lacus et nisl euismod egestas. Aenean aliquet laoreet luctus.</p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bt-javascript')
    <script>
        let deleteMessages = {
            title: '{{ __("Are you sure about deleting images?") }}',
            confirm: '{{ __("Yes, Delete") }}',
            cancel: '{{ __("No") }}',
        }
        let langImage = "{{ __("Image") }}";
        let langThumbnail = "{{ __("Thumbnail") }}";
    </script>
@endsection

