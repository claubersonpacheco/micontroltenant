<!-- Card Section -->
<div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                {{ __('Tenant') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Manage your tenant.') }}
            </p>
        </div>

        <form wire:submit.prevent="store">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                <!-- Full Name -->
                <div class="sm:col-span-3">
                    <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Full name
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="name" id="name" type="text"
                           class="py-1.5 sm:py-2 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                           placeholder="Maria">
                    @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Full Name -->

                <!-- Email -->
                <div class="sm:col-span-3">
                    <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Email
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="email" id="email" type="email"
                           class="py-1.5 sm:py-2 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                           placeholder="maria@site.com">
                    @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Email -->

                <!-- Password -->
                <div class="sm:col-span-3">
                    <label for="password" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Password
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="password" id="password" type="password"
                           class="py-1.5 sm:py-2 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                           placeholder="Enter password">
                    @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Password -->

                <!-- Domain -->
                <div class="sm:col-span-3">
                    <label for="domain" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        Domain
                    </label>
                </div>
                <div class="sm:col-span-9">
                    <input wire:model="domain" id="domain" type="text"
                           class="py-1.5 sm:py-2 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"
                           placeholder="example.tenant.com">
                    @error('domain')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Domain -->
            </div>
            <!-- End Grid -->

            <div class="mt-5 flex justify-end gap-x-2">
                <button type="button"
                        class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    Cancel
                </button>
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
