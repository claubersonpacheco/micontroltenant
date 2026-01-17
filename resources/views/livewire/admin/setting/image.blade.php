@php use App\Services\BunnyServices; @endphp
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    {{-- ================= LOGO ================= --}}
    <div x-data="{ showModal: @entangle('showLogoModal') }" class="bg-white p-4 rounded-lg border border-gray-300">
        <h2 class="font-bold text-center mb-2">Logo</h2>

        @if($setting->logo)
            <img alt="logo" src="{{ BunnyServices::url($setting->logo) }}" class="h-20 mx-auto object-cover rounded">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->logo ? 'Alterar' : 'Adicionar' }}
            </button>
            @if($setting->logo)
                <button wire:click="deleteImage('logo')" class="btn btn-secondary text-xs">Remover</button>
            @endif
        </div>

        {{-- Modal --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-99 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 class="font-semibold mb-4">Upload Logo</h3>

                <input type="file" wire:model="logo" accept="image/*"
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

                @error('logo') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <div class=" flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="uploadLogo" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= LOGO IMPRESS ================= --}}
    <div x-data="{ showModal: @entangle('showLogoImpressModal') }"
         class="bg-white p-4 rounded-lg border border-gray-300">
        <h2 class="font-bold text-center mb-2">Logo Impress</h2>

        @if($setting->logo_impress)
            <img alt="logo_impress" src="{{ BunnyServices::url($setting->logo_impress) }}"
                 class="h-20 mx-auto object-cover rounded">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->logo_impress ? 'Alterar' : 'Adicionar' }}
            </button>
            @if($setting->logo_impress)
                <button wire:click="deleteImage('logo_impress')" class="btn btn-secondary text-xs">Remover</button>
            @endif
        </div>

        {{-- Modal --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-99 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 class="font-semibold mb-4">Upload Logo Impress</h3>


                <input type="file" wire:model="logo_impress" accept="image/*"  class="block w-full text-sm text-gray-500
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

                @error('logo_impress') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <div class="flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="uploadLogoImpress" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= FAVICON ================= --}}
    <div x-data="{ showModal: @entangle('showFaviconModal') }" class="bg-white p-4 rounded-lg border border-gray-300">
        <h2 class="font-bold text-center mb-2">Favicon</h2>

        @if($setting->favicon)
            <img alt="favicon" src="{{ BunnyServices::url($setting->favicon) }}"
                 class="h-16 mx-auto object-cover rounded">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->favicon ? 'Alterar' : 'Adicionar' }}
            </button>
            @if($setting->favicon)
                <button wire:click="deleteImage('favicon')" class="btn btn-secondary text-xs">Remover</button>
            @endif
        </div>

        {{-- Modal --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-99 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">
                <h3 class="font-semibold mb-4">Upload Favicon</h3>

                <input type="file" wire:model="favicon" accept="image/*"  class="block w-full text-sm text-gray-500
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

                @error('favicon') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                <div class="flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="uploadFavicon" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</div>
