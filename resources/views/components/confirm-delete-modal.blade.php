@props([
    'title' => 'Confirm deletion',
    'message' => 'Are you sure you want to delete this item?',
    'action' => null,
    'cancelText' => __('common.cancel'),
    'confirmText' => __('common.confirm'),
])

<div x-data="{ open: false }">
    <!-- Trigger -->
    @if(isset($trigger))
        <span @click="open = true">
            {{ $trigger }}
        </span>
    @endif

    <!-- Modal -->
    <div
        x-show="open"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-99 flex items-center justify-center bg-black/50"
        @click.self="open = false"
    >
        <div
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="scale-95 opacity-0"
            x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="scale-100 opacity-100"
            x-transition:leave-end="scale-95 opacity-0"
            class="bg-white rounded-xl shadow-lg w-full max-w-md p-6"
        >
            <h3 class="text-xl font-bold mb-4">{{ $title }}</h3>
            <p class="mb-6">{{ $message }}</p>

            <div class="flex justify-end gap-3">
                <button @click="open = false" class="px-4 py-2 bg-gray-200 rounded">
                    {{ $cancelText }}
                </button>
                <button
                    wire:click="{{ $action }}"
                    @click="open = false"
                    class="px-4 py-2 bg-red-500 text-white rounded"
                >
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>
