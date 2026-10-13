@props (['is' => 'a' ,'title' => null, 'text' => null])

<{{ $is }} {{ $attributes->merge(['class' => 'card grid gap-3']) }}>
    @if ( $title != null && $text != null) 
        <h3 class="text-lg font-bold line-clamp-1 pt-2">{{  $title  }}</h3>
        <p class="text-muted-foreground text-sm self-end text-justify tracking-wide line-clamp-2 cursor-pointer">{{ $text }}</p>
    @endif

    {{ $slot }}
    
</{{ $is }}>