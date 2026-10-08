<x-layout>
    <div>
        <header class="pt-10 py-5">
            <h3 class="text-5xl font-extrabold tracking-wide text-foreground">All Ideas</h3>
            <p class="text-muted-foreground text-3xl tracking-tight" >All Fabrications reside <strong>Here</strong> and <strong>Now</strong>.</p>
        </header>

        <div class="mt-15 grid md:grid-cols-2 gap-4 align-self-between">
            @forelse ($ideas as $idea)

            <x-card href="/idea/{{ $idea->id }}" title="{{ $idea->title }}" text="{{ $idea->description }}">
            <div class="justify-self-end text-xs" >{{ $idea->created_at->diffForHumans() }}</div>            
            </x-card>
            @empty
                <p class="text-foreground text-md text-center">No Ideas yet? Here are some Suggestions to Fabricate your own!</p>
                {{-- Add Inspirational Fabrications when empty --}}
            @endforelse
        </div>

    </div>
</x-layout>