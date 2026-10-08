@props(['status' => 'pending'])
@php
    $classes = "btn uppercase rounded-2xl";

    if ($status == 'pending')
    {
        $classes .= " bg-yellow-300/15 text-yellow-500 border-yellow-500";
    }
    else if ($status == 'completed')
    {
        $classes .= " bg-green-300/15 text-green-500 border-green-500";
    }
    else 
    {
        $classes .= " bg-indigo-300/15 text-indigo-500 border-indigo-500";
    }

@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>