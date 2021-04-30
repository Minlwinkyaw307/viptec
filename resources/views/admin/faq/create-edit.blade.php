@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("FAQ") }}</h2>
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
                <form action="{{ isset($data) ? route('admin.faq.update', ['faq' => $data->id]) : route('admin.faq.store') }}" method="post">
                    @csrf
                    @isset($data)
                        @method('put')
                    @endisset
                    <x-admin::text-input
                        :label="__('Question') . ' (' . __('Turkish') . ')'"
                        name="tr_question"
                        :value="old('tr_question') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->question : null"
                        :placeholder="__('Please Enter Question')"
                        :error="$errors->first('tr_question') ?? null"
                    ></x-admin::text-input>
                    <x-admin::text-input
                        :label="__('Name') . ' (' . __('English') . ')'"
                        name="en_question"
                        :value="old('en_question') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->question : null"
                        :placeholder="__('Please Enter Question')"
                        :error="$errors->first('en_question') ?? null"
                    ></x-admin::text-input>

                    <x-admin::text-input
                        :label="__('Answer') . ' (' . __('Turkish') . ')'"
                        name="tr_answer"
                        :value="old('tr_answer') ?? isset($data) ? $data->translations->where('language_id', 1)->first()->answer : null"
                        :placeholder="__('Please Enter Answer')"
                        :error="$errors->first('tr_answer') ?? null"
                        :textarea="true"
                        :rows="5"
                    ></x-admin::text-input>
                    <x-admin::text-input
                        :label="__('Answer') . ' (' . __('English') . ')'"
                        name="en_answer"
                        :value="old('en_answer') ?? isset($data) ? $data->translations->where('language_id', 2)->first()->answer : null"
                        :placeholder="__('Please Enter Answer')"
                        :error="$errors->first('en_answer') ?? null"
                        :textarea="true"
                        :rows="5"
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
    </div>
@endsection


