<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                {{ __('Category') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Edit your category.') }}
            </p>
        </div>

        <!-- Aqui trocamos o método de envio -->
        <form  wire:submit.prevent="update">
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                <!-- Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Name') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model.defer="name" id="name" type="text" placeholder="Name category"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="sm:col-span-3">
                    <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Description') }}
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <textarea wire:model.defer="description" id="description" placeholder="Enter with description"
                              class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                    @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-5 flex justify-end gap-x-2">
                <a href="{{ route('category.index') }}"
                   class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    Cancel
                </a>
                <button type="submit"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    Save changes
                </button>
            </div>
        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
