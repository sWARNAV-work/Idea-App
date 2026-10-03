@props(['title', 'description'])

<div class="grid max-inline-7xl justify-items-center align-items-center mt-20">
    <h2 class="text-5xl text-primary-foreground font-bold tracking-tight">{{ $title }}</h2>
    <p class="text-muted-foreground text-2xl font-extralight tracking-normal">{{ $description }}</p>

    {{ $slot }}
</div>