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
                        <button class="button-error focus:outline-none link-button"
                                data-link="{{ url()->previous() }}">{{ __("Back") }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-between mx-auto">
            <div class="tabs border-0 w-full">
                <div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
                    <div class="tabs-nav w-full">
                        <ul class="flex relative ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header ui-sortable"
                            role="tablist">
                            <li role="tab" tabindex="0"
                                class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active ui-sortable-handle"
                                aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true"
                                aria-expanded="true"><a class="flex items-center ui-tabs-anchor" href="#tabs-1"
                                                        role="presentation" tabindex="-1" id="ui-id-1">
                                    {{ __("Product Information") }}</a></li>
                            <li role="tab" tabindex="-1"
                                class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-sortable-handle"
                                aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false"
                                aria-expanded="false"><a class="flex items-center ui-tabs-anchor" href="#tabs-2"
                                                         role="presentation" tabindex="-1" id="ui-id-2">
                                    {{ __("Images") }}</a></li>
                            <li role="tab" tabindex="-1"
                                class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-sortable-handle"
                                aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false"
                                aria-expanded="false"><a class="flex items-center ui-tabs-anchor" href="#tabs-3"
                                                         role="presentation" tabindex="-1" id="ui-id-3">
                                    {{ __("Packages") }}</a></li>
                        </ul>
                    </div>
                    <form action="{{ isset($product) ? route('admin.product.update', ['product' => $product->id]) : route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tabs-content">
                            <div id="tabs-1" aria-labelledby="ui-id-1" role="tabpanel"
                                 class="ui-tabs-panel ui-corner-bottom ui-widget-content w-full" aria-hidden="false">
                                <div class="w-full flex flex-row items-center justify-between">
                                    <div class="w-1/6"></div>
                                    <div class="w-4/6">
                                        <x-admin::file-input
                                            :label="__('Image')"
                                            name="image"
                                            :old="isset($product) ? $product->imageUrl : null"
                                            :required="isset($product) ? false : true"
                                        ></x-admin::file-input>

                                        <x-admin::text-input
                                            :label="__('Code')"
                                            name="code"
                                            :value="old('code') ?? isset($product) ? $product->code : null"
                                            :placeholder="__('Please Enter Product Code')"
                                            :error="$errors->first('code') ?? null"
                                        ></x-admin::text-input>

                                        <x-admin::select-input
                                            name="category_id"
                                            :value="old('category_id') ?? isset($product) ? $product->category_id : null"
                                            :options="$category_options"
                                            :label="__('Category')"
                                            id="category_id"
                                        ></x-admin::select-input>

                                        <x-admin::text-input
                                            :label="__('Title') . ' (' . __('Turkish') . ')'"
                                            name="tr_title"
                                            :value="old('tr_title') ?? isset($product) ? $product->translations->where('language_id', 1)->first()->title : null"
                                            :placeholder="__('Please Enter Product Name')"
                                            :error="$errors->first('tr_title') ?? null"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Title') . ' (' . __('English') . ')'"
                                            name="en_title"
                                            :value="old('en_title') ?? isset($product) ? $product->translations->where('language_id', 2)->first()->title : null"
                                            :placeholder="__('Please Enter Product Name')"
                                            :error="$errors->first('en_title') ?? null"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Description') . ' (' . __('Turkish') . ')'"
                                            name="tr_description"
                                            :value="old('tr_description') ?? isset($product) ? $product->translations->where('language_id', 1)->first()->description : null"
                                            :placeholder="__('Please Enter Product Description')"
                                            :error="$errors->first('tr_description') ?? null"
                                            :textarea="true"
                                            :rows="7"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Description') . ' (' . __('English') . ')'"
                                            name="en_description"
                                            :value="old('en_description') ?? isset($product) ? $product->translations->where('language_id', 2)->first()->description : null"
                                            :placeholder="__('Please Enter Product Description')"
                                            :error="$errors->first('en_description') ?? null"
                                            :textarea="true"
                                            :rows="7"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Available Color') . ' (' . __('Turkish') . ')'"
                                            name="tr_color"
                                            :value="old('tr_color') ?? isset($product) ? $product->translations->where('language_id', 1)->first()->color : null"
                                            :placeholder="__('Please Enter Product Color')"
                                            :error="$errors->first('tr_color') ?? null"
                                            :required="false"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Available Color') . ' (' . __('English') . ')'"
                                            name="en_color"
                                            :value="old('en_color') ?? isset($product) ? $product->translations->where('language_id', 2)->first()->color : null"
                                            :placeholder="__('Please Enter Product Color')"
                                            :error="$errors->first('en_color') ?? null"
                                            :required="false"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Length') . ' (mm)'"
                                            name="length"
                                            :value="old('length') ?? isset($product) ? $product->length : null"
                                            :placeholder="__('Please Enter Product Length')"
                                            :error="$errors->first('length') ?? null"
                                            type="number"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Width') . ' (mm)'"
                                            name="width"
                                            :value="old('width') ?? isset($product) ? $product->width : null"
                                            :placeholder="__('Please Enter Product Width')"
                                            :error="$errors->first('width') ?? null"
                                            type="number"
                                        ></x-admin::text-input>

                                        <x-admin::text-input
                                            :label="__('Thickness') . ' (mm)'"
                                            name="thickness"
                                            :value="old('thickness') ?? isset($product) ? $product->thickness : null"
                                            :placeholder="__('Please Enter Product Thickness')"
                                            :error="$errors->first('thickness') ?? null"
                                            type="number"
                                            :required="false"
                                        ></x-admin::text-input>

                                        <x-admin::select-input
                                            :label="__('Features')"
                                            name="feature_ids[]"
                                            :options="$feature_options"
                                            :value="old('feature_ids') ?? (isset($product) ? $product->product_features->pluck('feature.id')->toArray() : [])"
                                            id="feature_ids"
                                            :required="true"
                                            :multiple="true"
                                        ></x-admin::select-input>

                                        <x-admin::select-input
                                            :label="__('Blade')"
                                            name="product_compatibles[]"
                                            :options="$product_options"
                                            :value="old('product_compatibles') ?? (isset($product) ? $product->product_compatibles->pluck('blade_id')->toArray() : [])"
                                            id="feature_ids"
                                            :required="false"
                                            :multiple="true"
                                        ></x-admin::select-input>

                                        <x-admin::select-input
                                            :label="__('Active?')"
                                            name="visible"
                                            :options="[__('No'), __('Yes')]"
                                            :value="old('visible') ?? isset($product) ? $product->visible : true"
                                            id="visible"
                                            :required="true"
                                        ></x-admin::select-input>

                                        <div class="form-element float-right">
                                            <button type="submit"
                                                    class="button-first"
                                            >{{ __(isset($product) ? "Update" : "Save") }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-1/6"></div>

                                </div>
                            </div>
                            <div id="tabs-2" aria-labelledby="ui-id-2" role="tabpanel"
                                 class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                                 style="display: none;">
                                <div class="w-full flex flex-row items-center justify-between">
                                    <div class="w-1/6"></div>
                                    <div class="w-4/6">
                                        <div class="form-element" id="image-wrapper">
                                            <button type="button"
                                                    class="button-first focus:outline-none add-new-image-and-thumb"
                                                    data-link="">{{ __("New Image") }}
                                            </button>
                                            @if(isset($product))
                                                @foreach($product->product_images as $product_image)
                                                    <div id="image-wrapper-{{ $product_image->id }}">
                                                        <input type="hidden" value="{{ $product_image->id }}"
                                                               name="image_ids[]">
                                                        <div class="flex flex-row">
                                                            <x-admin::file-input
                                                                :label="__('Thumbnail')"
                                                                :name="'thumbnails[' . $product_image->id . ']'"
                                                                class="w-1/2"
                                                                :old="$product_image->thumbnailUrl"
                                                                :required="false"
                                                            ></x-admin::file-input>
                                                            <x-admin::file-input
                                                                :label="__('Image')"
                                                                class="w-1/2"
                                                                :name="'images[' . $product_image->id . ']'"
                                                                :old="$product_image->imageUrl"
                                                                :required="false"
                                                            ></x-admin::file-input>
                                                        </div>
                                                        <div class="form-element">
                                                            <button type="button"
                                                                    data-link="{{ route('admin.product_image.destroy', ['id' => $product_image->id]) }}"
                                                                    data-csrf="{{ csrf_token() }}"
                                                                    data-id="1"
                                                                    data-name="image-wrapper-"
                                                                    class="button-error focus:outline-none delete-product-image-btn">
                                                                {{ __("Delete Image") }}
                                                            </button>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="form-element float-right">
                                            <button type="submit"
                                                    class="button-first focus:outline-none"
                                            >{{ __(isset($product) ? "Update" : "Save") }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-1/6"></div>
                                </div>
                            </div>
                            <div id="tabs-3" aria-labelledby="ui-id-3" role="tabpanel"
                                 class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true"
                                 style="display: none;">
                                <div class="w-full flex flex-row items-center justify-between">
                                    <div class="w-1/6"></div>
                                    <div class="w-4/6">
                                        <div class="form-element" id="package-wrapper">
                                            <button type="button"
                                                    class="button-first focus:outline-none add-new-product-package"
                                                    data-link="">{{ __("New Package Type") }}
                                            </button>
                                            @if(isset($product))
                                                @foreach($product->product_package_types as $package)
                                                    <div id="package-wrapper-{{ $package->id }}">
                                                        <input type="hidden" value="{{ $package->id }}" name="package_ids[]">
                                                        <x-admin::select-input
                                                            :label="__('Package')"
                                                            :name="'packages[' . $package->id . ']'"
                                                            :options="$package_type_options"
                                                            :value="old('packages')[$loop->index] ?? $package->package_type_id"
                                                            :required="true"
                                                        ></x-admin::select-input>

                                                        <div class="flex flex-row">
                                                            <x-admin::file-input
                                                                :label="__('Image')"
                                                                :name="'package_images[' . $package->id. ']'"
                                                                class="w-1/2"
                                                                :old="$package->imageUrl"
                                                                :required="false"
                                                            ></x-admin::file-input>

                                                            <x-admin::text-input
                                                                :label="__('Amount')"
                                                                :name="'amounts[' . $package->id . ']'"
                                                                class="w-1/2"
                                                                :value="old('amount')[$loop->index] ?? $package->amount"
                                                                :placeholder="__('Please Enter Pacakge Amount')"
                                                                :error="$errors->first('amounts') ?? null"
                                                                type="number"
                                                                :required="false"
                                                            ></x-admin::text-input>
                                                        </div>
                                                        <div class="form-element">
                                                            <button type="button"
                                                                    data-link="{{ route('admin.product-package-type.destroy', ['id' => $package->id]) }}"
                                                                    data-csrf="{{ csrf_token() }}"
                                                                    data-id="1"
                                                                    data-name="package-wrapper-"
                                                                    class="button-error color-error focus:outline-none delete-product-package-btn">
                                                                {{ __("Delete Image") }}
                                                            </button>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                        <div class="form-element float-right">
                                            <button type="submit"
                                                    class="button-first"
                                            >{{ __(isset($product) ? "Update" : "Save") }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-1/6"></div>
                                </div>
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
        let langAddNewImages = "{{ __("Delete Image") }}"

        let langSuccessPopUp = {
            'title': "{{ __("Success") }}",
            'description': "{{ __("Successfully Created") }}",
        }

        let packageTypeOptions = JSON.parse(`{!! json_encode($package_type_options) !!}`);
    </script>
@endsection

