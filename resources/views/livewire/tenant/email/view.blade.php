<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7 dark:bg-neutral-800">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    {{ __('View Email') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                    {{ __('Email send') }}.
                </p>
            </div>


            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                <!-- Created -->
                <div class="sm:col-span-2">
                    <label for="subject" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Date Send') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <div class="flex flex-col gap-y-1" bis_skin_checked="1">

                        <div class="flex items-center gap-x-1.5" bis_skin_checked="1">
                            <svg class="shrink-0 size-4 text-gray-800 dark:text-neutral-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <path d="M21 17V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11Z"></path>
                                <path d="M3 10h18"></path>
                                <path d="M15 22v-4a2 2 0 0 1 2-2h4"></path>
                            </svg>

                            <span class="font-medium text-sm text-gray-800 dark:text-neutral-200">
                                {{ $email->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>

                </div>



                <!-- Subject -->
                <div class="sm:col-span-2">
                    <label for="subject" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Subject') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <input id="subject" type="text" value="{{ $email->subject }}"
                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">

                </div>


                <!-- Name -->
                <div class="sm:col-span-2">
                    <label for="customer" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Customer') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <input id="customer" type="text" value="{{ $email->customer->name }}"
                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                </div>

                <!-- Price -->
                <div class="sm:col-span-2">
                    <label for="recipient_email"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Email') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <input id="recipient_email" type="email" step="0.01" value="{{ $email->recipient_email }}"
                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                   focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                </div>

                <!-- Price -->
                <div class="sm:col-span-2">
                    <label for="additional_emails"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('CC') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <input id="additional_emails" type="text"
                        value="{{ is_array($email->additional_emails) ? implode(',', $email->additional_emails) : $email->additional_emails }}"
                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
              focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">

                </div>


                <!-- Description -->
                <div class="sm:col-span-2">
                    <label for="message" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Message') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <textarea id="message" placeholder="{{ $email->message  }}"
                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                      focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400"></textarea>
                </div>

                <!-- Status -->
                <div class="sm:col-span-2">
                    <label for="additional_emails"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('Status') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    <span
                        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                        <span class="size-1.5 inline-block rounded-full bg-blue-800 dark:bg-blue-500"></span>
                        {{ ($email->status === true) ? "Enviado" : "No enviado"  }}
                    </span>



                </div>

                <div class="sm:col-span-2">
                    <label for="additional_emails"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                        {{ __('File') }}
                    </label>
                </div>
                <div class="sm:col-span-10">
                    @if(!empty($email->file) && file_exists(public_path($email->file_path)))
                        <a href="{{ asset($email->file) }}"
                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:outline-hidden focus:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                            {{ __('Download PDF') }}
                        </a>
                    @endif
                </div>


            </div>

            <!-- Buttons -->
            <div class="mt-5 flex justify-end gap-x-2">
                <a href="{{ route('tenant.email.index') }}"
                    class="py-2 px-3 inline-flex items-center text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                    {{ __('Return') }}
                </a>

            </div>

        </div>
        <!-- End Card -->
    </div>
</div>