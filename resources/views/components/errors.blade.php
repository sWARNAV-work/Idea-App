@props(['name'])
@error($name)
    <p class="error text-red-400">{{ $message }}</p>
@enderror