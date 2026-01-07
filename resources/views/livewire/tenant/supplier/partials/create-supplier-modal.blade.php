<div>
    <!-- Modal -->
    <div x-data="{ open: @entangle('show') }"
         x-show="open"
         x-cloak
         class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500/50 overflow-y-auto"
         style="background-color: rgba(107, 114, 128, 0.5);">

        <!-- Container do conteúdo rolável -->
        <div class="w-full max-w-4xl mx-3 my-8 rounded-xl shadow-lg bg-white dark:bg-neutral-800 dark:border-neutral-700 overflow-y-auto max-h-[90vh]">

            <!-- Cabeçalho -->
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700 sticky top-0 bg-white dark:bg-neutral-800 z-10">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    {{ __('New Supplier') }}
                </h3>
                <button wire:click="closeModal" type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close">
                    <span class="sr-only">{{ __("Close") }}</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <form id="customer-create" wire:submit.prevent="store">
            <!-- Conteúdo rolável -->
            <div class="p-6 space-y-6">
                <!-- Aqui entra o teu formulário completo -->
                @include('livewire.tenant.supplier.partials.supplier-form')
            </div>

            <div class="sticky bottom-0 border-t border-gray-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 p-4 flex justify-end gap-x-2 shadow-sm z-10">
                <button wire:click="closeModal"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" form="customer-create"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    {{ __('Save') }}
                </button>
            </div>
            </form>

        </div>
    </div>
</div>
