<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    {{-- BLOCO: logo  --}}
    <div x-data="{ showModal: @entangle('showLogoModal') }" class="bg-white dark:bg-dark-700 p-4 rounded-lg  border border-gray-200">
        <div class="text-center">
            <h2 class="font-bold mb-2">{{ __('Logo') }}</h2>

            @if($setting->logo)
                <img
                    src="{{ asset('storage/' . $setting->logo) }}"
                    alt="Foto de {{ $setting->title }}"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-4 border-gray-200 shadow-lg block"
                />
            @else
                <div class="w-20 h-20 mx-auto border-2 p-3 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </div>
            @endif

            <div class="mt-3 flex justify-center space-x-2">
                <button @click="showModal = true" class="btn btn-primary text-xs flex items-center justify-center gap-1">
                    {{-- Ícone de adicionar/editar --}}
                    @if($setting->logo)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.796a.75.75 0 01-.927-.928l.796-2.684a4.5 4.5 0 011.13-1.897L16.862 4.487z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    @endif
                    {{ $setting->logo ? 'Alterar' : 'Adicionar' }}
                </button>

                @if($setting->logo)
                    <button wire:click="deleteImage('logo')" class="btn btn-secondary text-xs flex items-center justify-center gap-1">
                        {{-- Ícone de lixeira --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h12m-9 0v10.5m6-10.5v10.5M4.5 7.5l1.125 12.128A2.25 2.25 0 007.866 21h8.268a2.25 2.25 0 002.241-2.372L19.5 7.5m-10.125 0V5.25A2.25 2.25 0 0111.625 3h.75A2.25 2.25 0 0114.25 5.25V7.5" />
                        </svg>
                        Remover
                    </button>
                @endif
            </div>
        </div>
        <!-- Modal  logo -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
            <div class="bg-white dark:bg-dark-700 rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Upload</h3>
                @error('logo') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                <div class="space-y-2 text-center">
                    <label for="af-submit-app-upload-images" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Preview image
                    </label>

                    {{-- Preview temporário centralizado acima --}}
                    @if ($logo)
                        <div class="flex justify-center mb-4">
                            <img src="{{ $logo->temporaryUrl() }}"
                                 alt="Preview Logo"
                                 class="w-20 h-20 object-cover rounded-full border-2 border-gray-300 shadow">
                        </div>
                    @endif

                    <div
                        x-data="{ dragging: false }"
                        x-on:click="$refs.input.click()"
                        x-on:dragover.prevent="dragging = true"
                        x-on:dragleave.prevent="dragging = false"
                        x-on:drop.prevent="
        dragging = false;
        $refs.input.files = $event.dataTransfer.files;
        $refs.input.dispatchEvent(new Event('change'));
    "
                        class="p-6 text-center border-2 border-dashed rounded-lg cursor-pointer transition
           border-gray-300 dark:border-neutral-700"
                        :class="dragging ? 'border-blue-500 bg-blue-50 dark:bg-neutral-800/50' : ''"
                    >
                        <!-- Input escondido -->
                        <input
                            wire:model="logo"
                            x-ref="input"
                            type="file"
                            accept="image/*"
                            class="hidden"
                        />

                        <!-- Ícone inicial -->
                        <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>

                        <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
                            Clique ou <span class="text-blue-600">arraste aqui</span>
                        </span>
                                        <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
                            Máx: 2 MB
                        </span>

                    </div>
                </div>
                <div class="mt-4 flex justify-end">
                    <button
                        @click="showModal = false; $wire.resetUploads()"
                        class="py-2 mr-4 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button wire:click="uploadLogo" @click="$wire.resetUploads(); showModal = true" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">Salvar</button>

                </div>

            </div>


        </div>
    </div>
    {{-- End BLOCO: Favicon --}}

    {{-- BLOCO: logo impress --}}
    <div x-data="{ showModal: @entangle('showLogoImpressModal') }" class="bg-white dark:bg-dark-700 p-4 rounded-lg  border border-gray-200">
        <div class="text-center">
            <h2 class="font-bold mb-2">{{ __('Logo Impress') }}</h2>

            @if($setting->logo_impress)
                <img
                    src="{{ asset('storage/' . $setting->logo_impress) }}"
                    alt="Foto de {{ $setting->title }}"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-4 border-gray-200 shadow-lg block"
                />
            @else
                <div class="w-20 h-20 mx-auto border-2 p-3 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </div>
            @endif

            <div class="mt-3 flex justify-center space-x-2">
                <button @click="showModal = true" class="btn btn-primary text-xs flex items-center justify-center gap-1">
                    @if($setting->logo_impress)
                        {{-- Pencil (editar) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.796a.75.75 0 01-.927-.928l.796-2.684a4.5 4.5 0 011.13-1.897L16.862 4.487z" />
                        </svg>
                    @else
                        {{-- Plus (adicionar) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    @endif
                    {{ $setting->logo_impress ? 'Alterar' : 'Adicionar' }}
                </button>

                @if($setting->logo_impress)
                    <button wire:click="deleteImage('logo_impress')" class="btn btn-secondary text-xs flex items-center justify-center gap-1">
                        {{-- Lixeira --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h12m-9 0v10.5m6-10.5v10.5M4.5 7.5l1.125 12.128A2.25 2.25 0 007.866 21h8.268a2.25 2.25 0 002.241-2.372L19.5 7.5m-10.125 0V5.25A2.25 2.25 0 0111.625 3h.75A2.25 2.25 0 0114.25 5.25V7.5" />
                        </svg>
                        Remover
                    </button>
                @endif
            </div>
        </div>
        <!-- Modal  logo impress -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
            <div class="bg-white dark:bg-dark-700 rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Upload</h3>
                @error('favicon') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                <div class="space-y-2 text-center">
                    <label for="af-submit-app-upload-images" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Preview image
                    </label>

                    {{-- Preview temporário centralizado acima --}}
                    @if ($logo_impress)
                        <div class="flex justify-center mb-4">
                            <img src="{{ $logo_impress->temporaryUrl() }}"
                                 alt="Preview Favicon"
                                 class="w-20 h-20 object-cover rounded-full border-2 border-gray-300 shadow">
                        </div>
                    @endif

                    <div
                        x-data="{ dragging: false }"
                        x-on:click="$refs.input.click()"
                        x-on:dragover.prevent="dragging = true"
                        x-on:dragleave.prevent="dragging = false"
                        x-on:drop.prevent="
        dragging = false;
        $refs.input.files = $event.dataTransfer.files;
        $refs.input.dispatchEvent(new Event('change'));
    "
                        class="p-6 text-center border-2 border-dashed rounded-lg cursor-pointer transition
           border-gray-300 dark:border-neutral-700"
                        :class="dragging ? 'border-blue-500 bg-blue-50 dark:bg-neutral-800/50' : ''"
                    >
                        <!-- Input escondido -->
                        <input
                            wire:model="logo_impress"
                            x-ref="input"
                            type="file"
                            accept="image/*"
                            class="hidden"
                        />

                        <!-- Ícone inicial -->
                        <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>

                        <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
            Clique ou <span class="text-blue-600">arraste aqui</span>
        </span>
                        <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
            Máx: 2 MB
        </span>

                    </div>





                </div>



                <div class="mt-4 flex justify-end">
                    <button
                        @click="showModal = false; $wire.resetUploads()"
                        class="py-2 mr-4 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button wire:click="uploadLogoImpress" @click="$wire.resetUploads(); showModal = true" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">Salvar</button>

                </div>

            </div>


        </div>
    </div>
        {{-- End BLOCO: Favicon --}}

    {{-- BLOCO: Favicon --}}
    <div x-data="{ showModal: @entangle('showFaviconModal') }" class="bg-white dark:bg-dark-700 p-4 rounded-lg  border border-gray-200">
        <div class="text-center">
            <h2 class="font-bold mb-2">Favicon</h2>

            @if($setting->favicon)
                <img
                    src="{{ asset('storage/' . $setting->favicon) }}"
                    alt="Foto de {{ $setting->title }}"
                    class="w-20 h-20 mx-auto rounded-full object-cover border-4 border-gray-200 shadow-lg block"
                />
            @else
                <div class="w-20 h-20 mx-auto border-2 p-3 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </div>
            @endif

            <div class="mt-3 flex justify-center space-x-2">
                <button @click="showModal = true" class="btn btn-primary text-xs flex items-center justify-center gap-1">
                    @if($setting->favicon)
                        {{-- Pencil (editar) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.796a.75.75 0 01-.927-.928l.796-2.684a4.5 4.5 0 011.13-1.897L16.862 4.487z" />
                        </svg>
                    @else
                        {{-- Plus (adicionar) --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    @endif
                    {{ $setting->favicon ? 'Alterar' : 'Adicionar' }}
                </button>

                @if($setting->favicon)
                    <button wire:click="deleteImage('favicon')" class="btn btn-secondary text-xs flex items-center justify-center gap-1">
                        {{-- Lixeira --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7.5h12m-9 0v10.5m6-10.5v10.5M4.5 7.5l1.125 12.128A2.25 2.25 0 007.866 21h8.268a2.25 2.25 0 002.241-2.372L19.5 7.5m-10.125 0V5.25A2.25 2.25 0 0111.625 3h.75A2.25 2.25 0 0114.25 5.25V7.5" />
                        </svg>
                        Remover
                    </button>
                @endif
            </div>
        </div>

        <!-- Modal Favicon -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
            <div class="bg-white dark:bg-dark-700 rounded-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Upload de Favicon</h3>
                @error('favicon') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                <div class="space-y-2 text-center">
                    <label for="af-submit-app-upload-images" class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-neutral-200">
                        Preview image
                    </label>

                    {{-- Preview temporário centralizado acima --}}
                    @if ($favicon)
                        <div class="flex justify-center mb-4">
                            <img src="{{ $favicon->temporaryUrl() }}"
                                 alt="Preview Favicon"
                                 class="w-20 h-20 object-cover rounded-full border-2 border-gray-300 shadow">
                        </div>
                    @endif

                    <div
                        x-data="{ dragging: false }"
                        x-on:click="$refs.input.click()"
                        x-on:dragover.prevent="dragging = true"
                        x-on:dragleave.prevent="dragging = false"
                        x-on:drop.prevent="
        dragging = false;
        $refs.input.files = $event.dataTransfer.files;
        $refs.input.dispatchEvent(new Event('change'));
    "
                        class="p-6 text-center border-2 border-dashed rounded-lg cursor-pointer transition
           border-gray-300 dark:border-neutral-700"
                        :class="dragging ? 'border-blue-500 bg-blue-50 dark:bg-neutral-800/50' : ''"
                    >
                        <!-- Input escondido -->
                        <input
                            wire:model="favicon"
                            x-ref="input"
                            type="file"
                            accept="image/*"
                            class="hidden"
                        />

                            <!-- Ícone inicial -->
                            <svg class="size-10 mx-auto text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg>

                            <span class="mt-2 block text-sm text-gray-800 dark:text-neutral-200">
            Clique ou <span class="text-blue-600">arraste aqui</span>
        </span>
                            <span class="mt-1 block text-xs text-gray-500 dark:text-neutral-500">
            Máx: 2 MB
        </span>

                    </div>





                </div>



                <div class="mt-4 flex justify-end">
                    <button
                        @click="showModal = false; $wire.resetUploads()"
                        class="py-2 mr-4 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button wire:click="uploadFavicon" @click="$wire.resetUploads(); showModal = true" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">Salvar</button>

                </div>

            </div>


        </div>

        {{-- End BLOCO: Favicon --}}
    </div>
</div>

