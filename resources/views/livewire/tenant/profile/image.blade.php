<div class="border border-gray-200  rounded-3xl">
    <div x-data="{ showModal: @entangle('showPhotoModal') }" class="bg-white p-4 rounded-lg border border-gray-300">
        <h2 class="font-bold text-center mb-2">Logo</h2>

        <div class="relative w-20 h-20 mx-auto">
            <img
                src="{{ $user->photoUrlTenant }}"
                alt="Foto de {{ $user->name }}"
                class="w-20 h-20 rounded-full object-cover border-4 border-gray-200 shadow-lg mx-auto"
            >

            @if($user->photo_path)
                <div class="absolute -top-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            @endif
        </div>

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $user->photo_path ? 'Alterar' : 'Adicionar' }}
            </button>
            @if($user->photo_path)
                <button wire:click="deletePhoto('photo_path')" class="btn btn-secondary text-xs">Remover</button>
            @endif
        </div>

        {{-- Modal --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-99 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 class="font-semibold mb-4">Upload Photo</h3>

                <input type="file" wire:model="photo" accept="image/*"
                       class="block w-full text-sm text-gray-500
                        file:me-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-600 file:text-white
                        hover:file:bg-blue-700
                        file:disabled:opacity-50 file:disabled:pointer-events-none
                        dark:text-neutral-500
                        dark:file:bg-blue-500
                        dark:hover:file:bg-blue-400"
                >
                @error('photo') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <div class=" flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="uploadPhoto" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>

