<div {{ $attributes->class(['form-element w-full']) }}>
    @if($label)
    <label class="block" for="{{ $id }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <select
        id="{{ $id }}"
        data-placeholder="{{ $placeholder ?? '' }}"
        class="select2-area select2-hidden-accessible {{ $input_class }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $multiple ? 'multiple' : '' }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option=>$value)
            <option {{ $is_selected($option) }} value="{{ $option }}">{{ $value }}</option>
        @endforeach
    </select>
    <div>
        {{ $slot }}
    </div>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
