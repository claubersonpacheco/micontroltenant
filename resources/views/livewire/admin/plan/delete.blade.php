<div
    x-data="{ open: false, planId: null }"
    x-on:open-modal.window="if($event.detail.name === 'delete-plan') { open = true; planId = $event.detail.id }"
    x-on:close-modal.window="if($event.detail.name === 'delete-plan') { open = false; planId = null }"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10"
    style="background-color: rgba(107, 114, 128, 0.5);"
>
    <div class="bg-white dark:bg-neutral-800 rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-bold text-gray-800 dark:text-neutral-200 mb-4">{{ __('Confirm Delete') }}</h2>
        <p class="text-sm text-gray-600 dark:text-neutral-400 mb-6">
            {{ __('Are you sure you want to delete this plan?') }}
        </p>

        <div class="flex justify-end gap-2">
            <button
                x-on:click="open = false; planId = null"
                class="py-2 px-4 rounded-lg border border-gray-300 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-700 dark:border-neutral-600 dark:text-neutral-200"
            >
                {{ __('Cancel') }}
            </button>

            <button
                wire:click="deletePlan(planId)"
                x-on:click="open = false"
                class="py-2 px-4 rounded-lg bg-red-600 text-white hover:bg-red-700"
            >
                {{ __('Delete') }}
            </button>
        </div>
    </div>
</div>
