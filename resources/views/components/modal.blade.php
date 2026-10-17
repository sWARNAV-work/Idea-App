@props(['name'])
<div
    x-data="{ show: false, name: @js($name) }"
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
    aria-labelledby="modal-{{ $name }}-title"
    :aria-hidden="!show"     {{-- Make it hidden to readers when it is not shown --}}
    tabindex="-1"  {{-- So this can't be selected with Tab --}}
>

    <div class="relative max-w-3xl max-block-[90dvh] inline-full overflow-auto">

        <x-card @click.away="show = false" title="Fabrication" h3_id="modal-create-idea-title"
        class="">

             <button aria-label="Close-Modal"
                 class="stroke-foreground absolute top-3 right-3"
                 @click="show = false"
             >
                 <x-icons.cross />
             </button>
             {{ $slot }}

        </x-card>

    </div>

</div>