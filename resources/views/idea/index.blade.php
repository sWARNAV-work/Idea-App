<x-layout>
    <div>
        <header class="pt-10 py-5">
            <h3 class="text-5xl font-extrabold tracking-wide text-foreground">All Ideas</h3>
            <p class="text-muted-foreground text-3xl tracking-tight">All Fabrications reside <strong>Here</strong> and
                <strong>Now</strong>.
            </p>
        </header>

        <div class="mt-10">
            <h3 class="text-3xl ">Fabricate an Idea</h3>
            <x-card is="button" type="button"
                x-data
                @click="$dispatch('open-modal', 'create-idea')"
                class="text-center py-9 text-2xl mt-5 cursor-text inline-full">
                <div class="flex justify-center items-center gap-4">
                    Start Fabrication HERE!<span class="blink-cursor -mt-3"><x-icons.nib class="fill-current" /></span>
                </div>
            </x-card>
        </div>

        <div class=" mt-10 flex gap-3 text-center">
            <a href="/ideas"
                class="btn btn-outlined inline-full {{ request('status') === null ? 'bg-primary-foreground text-black font-extrabold' : "" }} ">
                All <span class="text-xs pl-3">{{ $statuses->get('all') }}</span>
            </a>
            @foreach(App\IdeaStatus::cases() as $status)
                <a href="/ideas?status={{ $status->value }}"
                    class="btn btn-outlined inline-full 
                            {{ request('status') === $status->value ? 'bg-primary-foreground text-black font-extrabold' : '' }}">
                    {{ $status->label() }} <span
                        class="text-sm pl-3 font-extrabold">{{ $statuses->get($status->value) }}<span></a>
            @endforeach
        </div>

        <div class="mt-15 grid md:grid-cols-2 gap-4 justify-center">
            @forelse ($ideas as $idea)

                <x-card href="/idea/{{ $idea->id }}" title="{{ $idea->title }}" text="{{ $idea->description }}">

                    <div class="text-xs flex items-center justify-between pb-2">
                        {{ $idea->created_at->diffForHumans() }}

                        <x-status status="{{ $idea->status }}">
                            {{ $idea->status->label() }}
                        </x-status>

                    </div>

                </x-card>

            @empty
                <p class="text-foreground text-sm">No Ideas yet? Here are some Suggestions to
                    Fabricate your
                    own!</p>
                {{-- Add Inspirational Fabrications when empty --}}
            @endforelse
        </div>

        <div 
            x-data="{ show: false, name: 'create-idea' }"
            x-show="show"
            @open-modal.window="if($event.detail === name) show = true"
            @keydown.escape.window="show = false"
            x-transition:enter="duration-180"
            x-transition:enter-start="opacity-0"
            
            x-transition:leave="duration-130"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center backdrop-blur-sm z-50 bg-black/50"
            style="display: none;"
            role="dialog"
            aria-modal="true"
            aria-label="Create an Idea"
            :aria-hidden="!show"     {{-- Make it hidden to readers when it is not shown --}}
            tabindex="-1"  {{-- So this can't be selected with Tab --}}
        >
            
            <x-card class="py-9" @click.away="show = false">
                <p> This is the modal</p>
            </x-card>
        </div>

    </div>
</x-layout>