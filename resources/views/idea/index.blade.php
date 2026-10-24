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
                x-data @click="$dispatch('open-modal', 'create-idea')"
                data-test="create-idea-button"
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
                    {{ request('status') === $status->value ? 'bg-primary-foreground text-black font-extrabold' : '' }}"
                >
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
                <p class="text-foreground text-sm">No Ideas yet? Here are some Suggestions to Fabricate your own!</p>
                {{-- Add Inspirational Fabrications when empty --}}
            @endforelse
        </div>

        <x-modal name="create-idea">

            <form x-data="{ status: @js( old($status->value, 'pending')), links: @js( old('links', []) ), newLink: ''}" method="POST" action="{{ route('idea.store') }}" class="gap-y-3 pb-2">
                @csrf

                    <x-form.field name="title" label="Name" default="Name your Fabrication!" autofocus required />

                    <div class="flex justify-between mt-5">

                        <h3 class="text-foreground">Idea</h3>

                        <div class="flex justify-between space-x-4">
                            @foreach(App\IdeaStatus::cases() as $status)
                                <button type="button" 
                                    class="btn btn-ghost"
                                    data-test="button-status-{{ $status->value }}"
                                    @click="status = @js($status->value)"
                                    :class="{'text-primary': status === @js($status->value)}"
                                >
                                    {{ $status->label() }}
                                </button>

                            @endforeach
                            <input type="hidden" name="status" :value="status" class="input" >
                        </div>
                        <x-errors name="status" />
                    </div>

                    <x-form.field name="description" type="textarea" default="Fabrication begins here!" /> 

                    <div>
                        <fieldset class="flex-col gap-3">
                            <legend class="label">Links</legend>

                            <div class="flex flex-wrap gap-3 my-2 ">
                                <template x-for="(link, index) in links" :key="index">
                                <div class="flex max-inline-xs truncate pill">
                                    <input type="hidden" name="links[]" x-model="link">
                                    <p class="truncate" x-text="link.replace(/^https?:\/\//, '')"></p>
                                    <button type="button"
                                        @click="links.splice(index, 1)"
                                        class="stroke-foreground text-center"
                                    >
                                        <x-icons.cross class="w-1 h-1"/>
                                    </button>
                                </div>
                                </template>
                            </div>

                            <div class="flex gap-3">
                                    <input type="url"
                                    class="input flex-1"
                                    id="new-link"
                                    placeholder="http://example.com"
                                    autocomplete="url"
                                    spellcheck="false"
                                    x-model="newLink"
                                >
                                <button type="button" 
                                    class="stroke-foreground rotate-45" 
                                    @click="links.push(newLink.trim()); newLink=''"
                                    :disabled="newLink.trim() === ''"
                                    aria-label="add new link"
                                    data-test="add-new-link"
                                ><x-icons.cross /></button>
                            </div>
                            
                        </fieldset>

                    </div>
                    <div class="flex justify-end gap-3">
                        
                        <button type="button" 
                        class="btn-ghost text-foreground"
                        @click="show = false"
                        >
                            Cancel
                        </button>

                        <button type="submit" class="btn">Fabricate!</button>
                    </div>
                    
            </form>

        </x-modal>

    </div>
</x-layout>