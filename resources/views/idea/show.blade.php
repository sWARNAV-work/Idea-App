<x-layout>

    <div class="max-w-7xl">
        <div class="flex justify-between items-center mt-5">
            <a href="{{ route('idea.index') }}" class="flex gap-2 items-center"><x-icons.backarrow />Go Back to All
                Ideas</a>

            <div class="flex gap-2">
                <form action="{{ route('idea.edit', $idea) }}" method="GET">
                    @csrf
                    <button class="btn btn-outlined py-3">
                        <x-icons.edit class="fill-foreground" />
                        Edit
                    </button>
                </form>

                <form action="{{ route('idea.destroy', $idea) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn bg-red-700/80 text-foreground font-extrabold ">
                        <x-icons.delete />
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <h2 class="text-5xl tracking-tight font-semibold mt-10">{{ $idea->title }}</h2>

        <div class="mt-10 flex items-center justify-between gap-4">
            <p class="font-bold">Created On {{ $idea->created_at }}</p>
            <div class="flex gap-2 items-center">
                <p class="font-bold">Last Updated : {{ $idea->updated_at->diffForHumans() }}</p>
                <x-status status="{{ $idea->status->value }}">{{ $idea->status->label() }}</x-status>
            </div>
        </div>

        <div class="mt-10">
            <x-card class="text-justify pb-8 px-6 text-2xl">
                {{ $idea->description }}
            </x-card>
        </div>

        <div>
            <h3 class="text-4xl mt-10 font-semibold space-y-6">Links</h3>
            @foreach ($idea->links as $link)
                <a href="{{ $link }}" class="text-primary mt-4 text-lg flex items-center gap-2 pl-5"> 
                    <x-icons.external class="fill-primary h-2" />
                    {{ $link }} 
                </a>
            @endforeach
        </div>

    </div>

</x-layout>