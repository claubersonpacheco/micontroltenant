<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card Section -->
        <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                        {{ __('Setting') }}
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ __('Create your setting.') }}
                    </p>
                </div>

                <form id="setting-create" wire:submit.prevent="store">
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                        <!-- Title -->
                        <div class="sm:col-span-3">
                            <label for="title" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Title') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="title" id="title" type="text" placeholder="Name this employer"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('title') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Document -->
                        <div class="sm:col-span-3">
                            <label for="document" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Document') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="document" id="document" type="text" placeholder="Enter document number"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('document') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-3">
                            <label for="email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Email') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="email" id="email" type="email" placeholder="youremail@example.com"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Address -->
                        <div class="sm:col-span-3">
                            <label for="address" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Address') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="address" id="address" type="text" placeholder="Enter address"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- City -->
                        <div class="sm:col-span-3">
                            <label for="city" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('City') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="city" id="city" type="text" placeholder="Enter city"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('city') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Postal Code -->
                        <div class="sm:col-span-3">
                            <label for="postal_code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Postal Code') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="postal_code" id="postal_code" type="text" placeholder="Enter postal code"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('postal_code') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Send Email -->
                        <div class="sm:col-span-3">
                            <label for="send_email" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Send Email') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="send_email" id="send_email" type="text" placeholder="Enter send email"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('send_email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- WhatsApp -->
                        <div class="sm:col-span-3">
                            <label for="whatsapp" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('WhatsApp') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="whatsapp" id="whatsapp" type="text" placeholder="Enter WhatsApp"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('whatsapp') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- Prefix -->
                        <div class="sm:col-span-3">
                            <label for="prefix" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Prefix') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="prefix" id="prefix" type="text" placeholder="Enter prefix"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('prefix') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- description -->
                        <div class="sm:col-span-3">
                            <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Description') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <textarea wire:model="description" id="description" type="text"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            </textarea>
                            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- keywords -->
                        <div class="sm:col-span-3">
                            <label for="keywords" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Keywords') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="keywords" id="keywords" type="text" placeholder="Keywords"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('keywords') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- author -->
                        <div class="sm:col-span-3">
                            <label for="author" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Author') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input wire:model="author" id="author" type="text" placeholder="Author"
                                   class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                            @error('author') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <!-- locale -->
                        <div class="sm:col-span-3">
                            <label for="locale" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                {{ __('Language') }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <select wire:model="locale" id="locale"
                                    class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                           focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800
                           dark:border-neutral-700 dark:text-neutral-400">

                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="pt_BR">Português (Brasil)</option>
                            </select>
                            @error('locale')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>

                    <!-- Buttons -->
                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                                class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" form="setting-create"
                                class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->
    </div>
</div>

