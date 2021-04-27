<div {{ $attributes->class(['form-element w-full']) }}>
    @if($label)
    <label class="block" for="{{ $id }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    @endif
    {{ $input_class }}
    @if(!$textarea)
        <input type="{{ $type }}"
               name="{{ $name }}"
               value="{{ $value ?? '' }}"
               class="form-control {{ $input_class }}"
               id="{{ $id }}"
               {{ $required ? 'required' : '' }}
               {{ $disabled ? 'disabled' : '' }}
               placeholder="{{ $placeholder }}">
    @else
        <textarea name="{{ $name }}"
                  id="{{ $id }}"
                  cols="{{ $cols }}"
                  rows="{{ $rows }}"
                  {{ $required ? 'required' : '' }}
                  {{ $disabled ? 'disabled' : '' }}
                  class="form-control {{ $input_class }}"
                  placeholder="{{ $placeholder }}">{{ $value ?? '' }}</textarea>
    @endif
    <div>
        {{ $slot }}
    </div>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
