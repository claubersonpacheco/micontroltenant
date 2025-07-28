<div>
    <!-- Foto atual do usuário -->
    <div class="flex items-center space-x-4">
        <div x-data="{ showModal: @entangle('showModal') }">
            <!-- Foto atual do usuário -->
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img
                        src="{{ $user->photo_url }}"
                        alt="Foto de {{ $user->name }}"
                        class="w-20 h-20 rounded-full object-cover border-4 border-gray-200 shadow-lg"
                    >

                    @if($user->has_photo)
                        <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="flex-1">
                    <div class="mt-2 space-x-2">
                        <button
                            @click="showModal = true"
                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $user->has_photo ? 'Alterar Foto' : 'Adicionar Foto' }}
                        </button>

                        @if($user->has_photo)
                            <button
                                wire:click="deletePhoto"
                                wire:confirm="Tem certeza que deseja remover sua foto?"
                                class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Remover Foto
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen bg-gray-500 bg-opacity-75">
                    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-900">Upload de Foto</h3>
                            <div class="mt-4">
                                @if($photo)
                                    <div class="mb-4 text-center">
                                        <img src="{{ $photo->temporaryUrl() }}" class="h-32 w-32 rounded-full object-cover border-4 border-gray-200 mx-auto">
                                        <p class="mt-2 text-sm text-gray-500">Preview da nova foto</p>
                                    </div>
                                @endif
                                <input
                                    id="photoInput"
                                    type="file"
                                    wire:model="photo"
                                    accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                >
                                @error('photo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                            <button
                                wire:click="savePhoto"
                                wire:loading.attr="disabled"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Salvar
                            </button>
                            <button
                                @click="showModal = false"
                                type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>
