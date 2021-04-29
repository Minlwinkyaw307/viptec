@extends('admin.layouts.base')

@section('content')
    <div class="table-list mt-6 w-full">
        <div class="table-list-header flex items-center justify-between">
            <div class="table-list-header-text">
                <h2>{{ __("Contact Message") }}</h2>
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
                <x-admin::text-input
                    :label="__('Name')"
                    name="name"
                    :value="old('name') ?? isset($data) ? $data->name : null"
                    :error="$errors->first('name') ?? null"
                    :disabled="true"
                ></x-admin::text-input>

                <x-admin::text-input
                    :label="__('Surname')"
                    name="surname"
                    :value="old('surname') ?? isset($data) ? $data->surname : null"
                    :error="$errors->first('surname') ?? null"
                    :disabled="true"
                ></x-admin::text-input>

                <x-admin::text-input
                    :label="__('Email')"
                    name="email"
                    :value="old('email') ?? isset($data) ? $data->email : null"
                    :error="$errors->first('email') ?? null"
                    :disabled="true"
                    type="email"
                ></x-admin::text-input>

                <x-admin::text-input
                    :label="__('Phone Number')"
                    name="phone"
                    :value="old('phone') ?? isset($data) ? $data->phone : null"
                    :error="$errors->first('phone') ?? null"
                    :disabled="true"
                ></x-admin::text-input>

                <x-admin::text-input
                    :label="__('Message')"
                    name="message"
                    :textarea="true"
                    :value="old('phone') ?? isset($data) ? $data->message : null"
                    :error="$errors->first('message') ?? null"
                    :disabled="true"
                ></x-admin::text-input>

            </div>
            <div class="w-1/6"></div>
        </div>
    </div>
    </div>
@endsection


