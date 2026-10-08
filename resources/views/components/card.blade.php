@props (['title', 'text'])
<a {{ $attributes->merge(['class' => 'card py-2 grid gap-3']) }}>
    <h3 class="text-lg font-bold line-clamp-1">{{  $title  }}</h3>
    <p class="text-muted-foreground text-sm self-end text-justify tracking-wide line-clamp-2">{{ $text }}</p>

    {{ $slot }}
</a>