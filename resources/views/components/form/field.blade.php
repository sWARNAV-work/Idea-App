@props(['name', 'label', 'default' => 'text', 'type' => 'text'])

<label for="{{ $name }}" class="label mt-3">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="input" placeholder="{{ $default }}" {{ $attributes }}>