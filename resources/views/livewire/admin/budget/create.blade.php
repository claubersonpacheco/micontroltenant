<!-- Card Section -->
<div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                {{ __('Budget') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Create your budget.') }}
            </p>
        </div>

        <form id="customer-create" wire:submit.prevent="store">

            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                <!-- Code -->
                <div class="sm:col-span-2">
                    <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Code') }}
                    </label>
                </div>
                <div class="sm:col-span-3">
                    <input wire:model="code" id="code" type="text" placeholder="Customer code"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                <div class="sm:col-span-7">
                </div>
                <!-- Date (atual) -->
                <div class="sm:col-span-2">
                    <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Date') }}
                    </label>
                </div>
                <div class="sm:col-span-3">
                    <input wire:model.live="date" id="date" type="date"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Expirate Date -->
                <div class="sm:col-span-2">
                    <label for="expirate" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Expirate Date') }}
                    </label>
                </div>
                <div class="sm:col-span-2">
                    <input wire:model.live="expirate"
                           id="expirate"
                           type="date"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('expirate') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!--calc date-->
                <div class="sm:col-span-1">
                    <label for="total_expirate" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Days ') }}
                    </label>
                </div>
                <div class="sm:col-span-2">
                    <input wire:model="total_expirate" id="total_expirate" readonly type="text"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                </div>

                <!-- Customer -->
                <div class="sm:col-span-2">
                    <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Customer') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <select wire:model="customer" id="customer" class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                        <option selected="">{{ __('Select the customer') }}</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Name') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <input wire:model="name" id="name" type="text" placeholder="{{ __('Name your budget') }}"
                           class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="sm:col-span-2">
                    <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Description') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <textarea wire:model="description" id="description" placeholder="Budget description"
                              class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                        focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                    @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-5 flex justify-end gap-x-2">
                <a href="{{ route('customer.index') }}"
                   class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" form="customer-create"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                    {{ __('Save changes') }}
                </button>
            </div>
        </form>

    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->
