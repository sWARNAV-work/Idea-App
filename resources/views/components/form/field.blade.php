@props(['name', 'label', 'default' => 'text', 'type' => 'text'])

<label for="{{ $name }}" class="label mt-3">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="input" value="{{ old($name, '') }}" placeholder="{{ $default }}" {{ $attributes }}>

@error($name)
    <p class="error text-red-600 mt-2">{{ $message }}</p>
@enderror