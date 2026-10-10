<x-layout>
    <div>
        <header class="pt-10 py-5">
            <h3 class="text-5xl font-extrabold tracking-wide text-foreground">All Ideas</h3>
            <p class="text-muted-foreground text-3xl tracking-tight">All Fabrications reside <strong>Here</strong> and
                <strong>Now</strong>.
            </p>
        </header>

        <div class=" mt-10 flex gap-3 text-center justify-between">
            <a href="/ideas" class="btn btn-outlined inline-full {{ request('status') === null ? 'bg-primary-foreground text-black font-extrabold' : "" }} ">
                All <span class="text-xs pl-2">{{ $statuses->get('all') }}
            </a>
            @foreach(App\IdeaStatus::cases() as $status)
                <a href="/ideas?status={{ $status }}" class="btn btn-outlined inline-full 
                {{ request('status') === $status->value ? 'bg-primary-foreground text-black font-extrabold' : '' }}">
                 {{ $status->label() }} <span class="text-xs pl-2" >{{ $statuses->get($status->value) }}<span></a>
            @endforeach
        </div>

        <div class="mt-15 grid md:grid-cols-2 gap-4 text-center justify-center">
            @forelse ($ideas as $idea)

                <x-card href="/idea/{{ $idea->id }}" title="{{ $idea->title }}" text="{{ $idea->description }}">

                    <div class="text-xs flex items-center justify-between">
                        {{ $idea->created_at->diffForHumans() }}

                        <x-status status="{{ $idea->status }}">
                            {{ $idea->status->label() }}
                        </x-status>

                    </div>

                </x-card>

            @empty
                <p class="text-foreground text-sm  border border-yellow-300">No Ideas yet? Here are some Suggestions to Fabricate your
                    own!</p>
                {{-- Add Inspirational Fabrications when empty --}}
            @endforelse
        </div>

    </div>
</x-layout>