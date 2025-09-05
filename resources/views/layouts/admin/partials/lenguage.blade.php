@php use Illuminate\Support\Facades\Session; @endphp
    <!-- Dropdown -->
@php

$english = __('English');
$spain = __('Español');
$portugues = __('Português');

@endphp

@php
    $locale = $tenantSettings->locale ?? app()->getLocale();

    $languages = [
        'en' => ['name' => __('English'), 'flag' => 'images/estados-unidos.png'],
        'es' => ['name' => __('Español'), 'flag' => 'images/spain.png'],
        'pt_BR' => ['name' => __('Português'), 'flag' => 'images/brasil.png'],
    ];
@endphp



<div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--adaptive:adaptive] [--is-collapse:true] md:[--is-collapse:false]">
    <button id="hs-header-scrollspy-dropdown" type="button" class="hs-dropdown-toggle w-full p-2 flex items-center text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 hs-scrollspy-active:bg-gray-100 dark:hs-scrollspy-active:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        <!-- Imagem e nome da linguagem atual -->
        <img src="{{ asset($languages[$tenantSettings->locale]['flag']) }}" alt="{{ $languages[$tenantSettings->locale]['name'] }}" class="w-5 h-5 rounded-full me-2">
        {{ $languages[$tenantSettings->locale]['name'] }}
        <!-- Ícone do Dropdown -->
        <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
    </button>

    <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-4.5 after:w-0.5 after:h-[calc(100%-4px)] after:bg-gray-100 dark:md:bg-neutral-900 dark:after:bg-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-header-scrollspy-dropdown">
        <div class="py-1 md:px-1 space-y-0.5">
            <div>{{ __('Language')}}: {{ $languages[$tenantSettings->locale]['name'] }}</div>

            <!-- Opções de troca de idioma -->
            <a href="{{ route('change.lang', ['lang' => 'en']) }}" class="size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <img src="{{ asset('images/estados-unidos.png') }}" alt="">
                <span class="sr-only">{{ __('English') }}</span>
            </a>

            <a href="{{ route('change.lang', ['lang' => 'es']) }}" class="size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <img src="{{ asset('images/spain.png') }}" alt="">
                <span class="sr-only"> {{ __('Spain') }}</span>
            </a>

            <a href="{{ route('change.lang', ['lang' => 'pt_BR']) }}" class="size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                <img src="{{ asset('images/brasil.png') }}" alt="">
                <span class="sr-only">{{ __('Portuguese') }}</span>
            </a>
        </div>
    </div>
</div>
<!-- End Dropdown -->




