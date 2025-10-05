<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card Section -->
        <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                        {{ __('Send Email') }}
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ __('Send the budget by email') }}.
                    </p>
                </div>

                <form wire:submit.prevent="sendEmail">
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                        <!-- Subject -->
                        <div class="sm:col-span-2">
                            <label for="subject" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Subject') }}
                            </label>
                        </div>
                        <div class="sm:col-span-10">
                            <input wire:model="subject" id="subject" type="text" placeholder="{{ __('Subject') }}"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('subject') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>


                        <!-- Name -->
                        <div class="sm:col-span-2">
                            <label for="customer" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Customer') }}
                            </label>
                        </div>
                        <div class="sm:col-span-10">
                            <input wire:model="customer" id="customer" type="text" placeholder="{{ __('Customer') }}"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('customer') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Price -->
                        <div class="sm:col-span-2">
                            <label for="recipient_email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Email') }}
                            </label>
                        </div>
                        <div class="sm:col-span-10">
                            <input wire:model="recipient_email" id="recipient_email" type="email" step="0.01" placeholder="{{ __('Email customer') }}"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('recipient_email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Price -->
                        <div class="sm:col-span-2">
                            <label for="additional_emails" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('CC') }}
                            </label>
                        </div>
                        <div class="sm:col-span-10">
                            <input wire:model="additional_emails" id="additional_emails" type="text" step="0.01" placeholder="{{ __('email1@email.com, email2@gmail.com') }}"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('additional_emails') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>


                        <!-- Description -->
                        <div class="sm:col-span-2">
                            <label for="message" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Message') }}
                            </label>
                        </div>
                        <div class="sm:col-span-10">
                            <textarea wire:model="message" id="message" placeholder="{{ __('Message') }}"
                                      class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                            @error('message') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="mt-5 flex justify-end gap-x-2">
                        <a href="{{ route('email.index') }}"
                           class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit"
                                class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            {{ __('Send') }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
    </div>

</div>
