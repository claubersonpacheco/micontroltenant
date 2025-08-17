<div class="border border-gray-200  rounded-3xl">
    <!-- Foto atual do usuário -->
    <div class="flex flex-col items-center space-y-4 p-4">
        <div x-data="{ showModal: @entangle('showModal') }">
            <!-- Foto atual do usuário -->
            <div class="text-center">
                <h2 class="font-bold mb-2">Foto do Usuário</h2>

                <div class="relative w-20 h-20 mx-auto">
                    <img
                        src="{{ $user->photo_url }}"
                        alt="Foto de {{ $user->name }}"
                        class="w-20 h-20 rounded-full object-cover border-4 border-gray-200 shadow-lg mx-auto"
                    >

                    @if($user->has_photo)
                        <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="mt-3 flex justify-center space-x-2">
                    <button
                        @click="showModal = true"
                        class="btn btn-primary text-xs flex items-center justify-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.796a.75.75 0 01-.927-.928l.796-2.684a4.5 4.5 0 011.13-1.897L16.862 4.487z" />
                        </svg>
                        {{ $user->has_photo ? 'Alterar Foto' : 'Adicionar Foto' }}
                    </button>

                    @if($user->has_photo)
                        <button
                            wire:click="deletePhoto"
                            wire:confirm="Tem certeza que deseja remover sua foto?"
                            class="btn btn-secondary text-xs flex items-center justify-center gap-1"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Remover Foto
                        </button>
                    @endif
                </div>
            </div>
            <!-- Modal -->
            <div x-show="showModal" x-cloak class="fixed inset-0 z-[99] flex items-center justify-center bg-gray-500 bg-opacity-10" style="background-color: rgba(107, 114, 128, 0.5);">
                <div class="bg-white dark:bg-dark-700 rounded-lg p-6 w-full max-w-md">
                    <h3 class="text-lg font-semibold mb-4">Upload de Foto</h3>
                    @error('photo') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

                    <div class="space-y-2 text-center">
                        {{-- Preview temporário centralizado acima --}}
                        @if($photo)
                            <div class="flex justify-center mb-4">
                                <img src="{{ $photo->temporaryUrl() }}" alt="Preview Foto" class="w-32 h-32 object-cover rounded-full border-2 border-gray-300 shadow">
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
                            class="p-6 text-center border-2 border-dashed rounded-lg cursor-pointer transition border-gray-300 dark:border-neutral-700"
                            :class="dragging ? 'border-blue-500 bg-blue-50 dark:bg-neutral-800/50' : ''"
                        >
                            <!-- Input escondido -->
                            <input
                                wire:model="photo"
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
                            class="py-2 mr-4 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50"
                        >
                            Cancelar
                        </button>
                        <button
                            wire:click="savePhoto"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        >
                            Salvar
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

