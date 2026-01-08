<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    {{-- LOGO --}}
    <div x-data="{ showModal: @entangle('showLogoModal') }"
         class="bg-white p-4 rounded-lg border border-gray-600">

        <h2 class="font-bold text-center mb-2">Logo</h2>

        @if($setting->logo)
            <img src="{{ \App\Services\BunnyServices::url($setting->logo) }}"
                 class=" h-20 mx-auto  object-cover">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->logo ? 'Alterar' : 'Adicionar' }}
            </button>

            @if($setting->logo)
                <button wire:click="deleteImage('logo')" class="btn btn-secondary text-xs">
                    Remover
                </button>
            @endif
        </div>

        {{-- MODAL --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">

                <h3 class="font-semibold mb-4">Upload Logo</h3>

                @if ($logo)
                    <img src="{{ $logo->temporaryUrl() }}"
                         class="w-20 h-20 mx-auto rounded-full mb-4">
                @endif

                <input type="file"
                       wire:model="logo"
                       accept="image/*"
                       class="block w-full mb-4">

                <div class="flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()"
                            class="btn btn-secondary">Cancelar</button>

                    <button wire:click="uploadLogo"
                            class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- LOGO IMPRESS --}}
    <div x-data="{ showModal: @entangle('showLogoImpressModal') }"
         class="bg-white p-4 rounded-lg border">

        <h2 class="font-bold text-center mb-2">Logo Impress</h2>

        @if($setting->logo_impress)
            <img alt="logo_impress" src="{{ \App\Services\BunnyServices::url($setting->logo_impress) }}"
                 class="h-20 mx-auto object-cover">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->logo_impress ? 'Alterar' : 'Adicionar' }}
            </button>

            @if($setting->logo_impress)
                <button wire:click="deleteImage('logo_impress')" class="btn btn-secondary text-xs">
                    Remover
                </button>
            @endif
        </div>

        {{-- MODAL --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">

                <h3 class="font-semibold mb-4">Upload Logo Impress</h3>

                @if ($logo_impress)
                    <img src="{{ $logo_impress->temporaryUrl() }}"
                         class="w-20 h-20 mx-auto rounded-full mb-4">
                @endif

                <input type="file"
                       wire:model="logo_impress"
                       accept="image/*"
                       class="block w-full mb-4">

                <div class="flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()"
                            class="btn btn-secondary">Cancelar</button>

                    <button wire:click="uploadLogoImpress"
                            class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- FAVICON --}}
    <div x-data="{ showModal: @entangle('showFaviconModal') }"
         class="bg-white p-4 rounded-lg border">

        <h2 class="font-bold text-center mb-2">Favicon</h2>

        @if($setting->favicon)
            <img alt="favicon" src="{{ \App\Services\BunnyServices::url($setting->favicon) }}"
                 class="h-16 mx-auto object-cover">
        @endif

        <div class="mt-3 flex justify-center gap-2">
            <button @click="showModal = true" class="btn btn-primary text-xs">
                {{ $setting->favicon ? 'Alterar' : 'Adicionar' }}
            </button>

            @if($setting->favicon)
                <button wire:click="deleteImage('favicon')" class="btn btn-secondary text-xs">
                    Remover
                </button>
            @endif
        </div>

        {{-- MODAL --}}
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">

                <h3 class="font-semibold mb-4">Upload Favicon</h3>

                @if ($favicon)
                    <img src="{{ $favicon->temporaryUrl() }}"
                         class="w-16 h-16 mx-auto rounded mb-4">
                @endif

                <input type="file"
                       wire:model="favicon"
                       accept="image/*"
                       class="block w-full mb-4">

                <div class="flex justify-end gap-2">
                    <button @click="showModal = false; $wire.resetUploads()"
                            class="btn btn-secondary">Cancelar</button>

                    <button wire:click="uploadFavicon"
                            class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</div>

