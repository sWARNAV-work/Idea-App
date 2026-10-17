@props(['name', 'label' => false, 'default' => 'text', 'type' => 'text'])

@if ($label)
    <label for="{{ $name }}" class="label mt-3">{{ $label }}</label>
@endif

@if ($type === 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}" class="textarea" {{ $attributes }} placeholder="{{ $default }}">{{ old($name, '') }}</textarea>
@else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="input" value="{{ old($name, '') }}" placeholder="{{ $default }}" {{ $attributes }}>
@endif

<x-errors name="{{ $name }}" />