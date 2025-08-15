<!-- Invoice -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <!-- Grid  -->
    <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">Presupuesto #{{ $budget->code }}</h2>
        </div>
        <!-- Col -->

        <div class="inline-flex gap-x-2">
            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
               href="#">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" y2="3"/>
                </svg>
                {{ __('Budget Pdf') }}
            </a>
            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
               href="#">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9"/>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                    <rect width="12" height="8" x="6" y="14"/>
                </svg>
                {{ __('Print') }}
            </a>
        </div>
        <!-- Col -->
    </div>
    <!-- End Grid -->

    <!-- Grid datos cliente -->
    <div class="grid md:grid-cols-2 gap-3">
        <div>
            <div class="grid space-y-3">
                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{__('Codigo cliente')}}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->customer->code }}
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{ __('Correo Eletronico:') }}
                    </dt>
                    <dd class="text-gray-800 dark:text-neutral-200">
                        <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-blue-500"
                           href="#">
                            {{ $budget->customer->email }}
                        </a>
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{ __('Detalle Cliente') }}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        <span class="block font-semibold">{{ $budget->customer->name }}</span>
                        <address class="not-italic font-normal">
                            {{ $budget->customer->address }}<br>
                        </address>
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{__('Documento')}}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        <span class="block font-semibold">{{ $budget->customer->document }}</span>
                    </dd>
                </dl>
            </div>
        </div>
        <!-- Col -->

        <div>
            <div class="grid space-y-3">

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{__('Date Budget')}}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->date->format('d/m/Y') }}
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{__('Expirate')}}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->expirate->format('d/m/Y') }}
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        {{ __('Validate') }}:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->total_expirate }} {{ __('Days') }}
                    </dd>
                </dl>
            </div>
        </div>
        <!-- Col -->
    </div>
    <!-- End Grid -->


    <!-- Table Section -->
    <!-- Card -->
    <div class="flex flex-col mt-6">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">

                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                {{ __("Services") }}
                            </h2>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                   href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18"/>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        <line x1="10" x2="10" y1="11" y2="17"/>
                                        <line x1="14" x2="14" y1="11" y2="17"/>
                                    </svg>
                                    Delete (2)
                                </a>

                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                   href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    {{__('View')}}
                                </a>

                                <!--dowloads-->
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                    <button id="hs-as-table-table-export-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                        Export
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-export-dropdown">
                                        <div class="py-2 first:pt-0 last:pb-0">
                                          <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                            Options
                                          </span>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/></svg>
                                                Copy
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                                                Print
                                            </a>
                                        </div>
                                        <div class="py-2 first:pt-0 last:pb-0">
                                          <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-neutral-600">
                                            Download options
                                          </span>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                </svg>
                                                Excel
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z"/>
                                                </svg>
                                                .CSV
                                            </a>
                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="#">
                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                                </svg>
                                                .PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end downloads -->

                                <!-- filter-->
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                    <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                                        Filter
                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-neutral-700 dark:text-neutral-300">
                                      2
                                    </span>
                                    </button>



                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                                <input wire:model.live="showService" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" >
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Service') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                                <input wire:model.live="showDescription" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-status" >
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Description') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                                <input wire:model.live="showQtd" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-created">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Quantity') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                                <input wire:model.live="showPrice" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-due-date">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Price Unit') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                                <input wire:model.live="showTax" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-amount">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Tax') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                                <input wire:model.live="showSubTotal" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-amount">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('SubTotal') }}</span>
                                            </label>
                                            <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                                <input wire:model.live="showTotal" type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-amount">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Total') }}</span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <!-- end filter -->

                                <livewire:admin.budget.items.add-item :budgetId="$budget->id" />
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-900">
                        <tr>
                            <th scope="col" class="ps-6 py-3 text-start">
                                <label for="hs-at-with-checkboxes-main" class="flex">
                                    <input type="checkbox"
                                           class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                           id="hs-at-with-checkboxes-main">
                                    <span class="sr-only">Checkbox</span>
                                </label>
                            </th>

                            {{-- Cabeçalho --}}
                            @if($showService)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __('Service') }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showDescription)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __('Description') }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showQtd)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("Quantity") }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showPrice)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("Price Unit") }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showTax)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("Tax") }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showSubTotal)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("SubTotal") }}
        </span>
                                    </div>
                                </th>
                            @endif

                            @if($showTaxValue)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("Tax value") }}
        </span>
                                    </div>
                                </th>
                            @endif


                            @if($showTotal)
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
            {{ __("Total") }}
        </span>
                                    </div>
                                </th>
                            @endif

                            <th  scope="col" class="px-6 py-3 text-center">
                                <div class="flex justify-center items-center gap-x-2 ">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                        {{ __("Action") }}
                                    </span>
                                </div>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                        @forelse($this->rows as $item)
                            <tr wire:key="item-{{ $item->id }}">
                            <td class="size-px whitespace-nowrap">
                                <div class="ps-6 py-2">
                                    <label for="hs-at-with-checkboxes-1" class="flex">
                                        <input type="checkbox"
                                               class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                               id="hs-at-with-checkboxes-1" checked>
                                        <span class="sr-only">Checkbox</span>
                                    </label>
                                </div>
                            </td>

                                @if($showService)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <div class="flex items-center gap-x-2">
                                                <div class="grow">
                                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                                        {{ $item->product->name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif

                                @if($showDescription)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->description }}</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showQtd)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->quantity }}</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showPrice)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ number_format($item->price, 2, ',', '.') }} €</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showTax)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2 flex gap-x-1">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->tax }}%</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showSubTotal)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2 flex gap-x-1">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ number_format($item->subtotal, 2, ',', '.') }} €</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showTaxValue)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2 flex gap-x-1">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ number_format($item->tax_value, 2, ',', '.') }} €</span>
                                        </div>
                                    </td>
                                @endif

                                @if($showTotal)
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2 flex gap-x-1">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ number_format($item->total, 2, ',', '.') }} €</span>
                                        </div>
                                    </td>
                                @endif

                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2 flex gap-x-1 justify-center items-center gap-x-3">

                                        <a title="Editar"
                                           wire:click="$dispatch('open-modal', { name: 'edit-item' }); $dispatch('edit-item', { id: {{ $item->id }} })"
                                           class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                            <!-- Icon -->
                                            <span
                                                class="m-1 inline-flex justify-center items-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                     class="w-6 h-6">
                                                  <path stroke-linecap="round" width="24" height="24"
                                                        stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                </svg>

                                            </span>

                                            <!-- End Icon -->
                                        </a>



                                        <a title="Excluir"
                                           class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                           wire:click="deleteItem({{ $item->id }})"
                                           wire:confirm="Are you sure you want to delete this post?">
                                            <!-- Icon -->
                                            <span
                                                class="m-1 inline-flex justify-center items-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                    </svg>
                                            </span>
                                        </a>
                                        <!-- End Icon -->
                                    </div>
                                </td>
                        </tr>

@empty
                            <tr>
                                <td colspan="8" class="size-px whitespace-now ">
                                    <div class="flex justify-center items-center py-2">
                                        Not found
                                    </div>
                                </td>
                            </tr>
@endforelse



                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!--modal -->
                    <livewire:admin.budget.items.edit-item  wire:key="edit-item-modal" />
                    <!-- end modal -->

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                        <div class="inline-flex items-center gap-x-2">
                            <!-- Paginação -->
                            <div class="mt-4">
                                {{ $rows->links() }}
                            </div>


{{--                            <p class="text-sm text-gray-600 dark:text-neutral-400">--}}
{{--                                Showing:--}}
{{--                            </p>--}}
{{--                            <div class="max-w-sm space-y-3">--}}
{{--                                <select--}}
{{--                                    class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">--}}
{{--                                    <option>1</option>--}}
{{--                                    <option>2</option>--}}
{{--                                    <option>3</option>--}}
{{--                                    <option>4</option>--}}
{{--                                    <option selected>9</option>--}}
{{--                                    <option>20</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <p class="text-sm text-gray-600 dark:text-neutral-400">--}}
{{--                                of 20--}}
{{--                            </p>--}}
                        </div>

{{--                        <div>--}}
{{--                            <div class="inline-flex gap-x-2">--}}
{{--                                <button type="button"--}}
{{--                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">--}}
{{--                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                        <path d="m15 18-6-6 6-6"/>--}}
{{--                                    </svg>--}}
{{--                                    Prev--}}
{{--                                </button>--}}

{{--                                <button type="button"--}}
{{--                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">--}}
{{--                                    Next--}}
{{--                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"--}}
{{--                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                                        <path d="m9 18 6-6-6-6"/>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    <!-- End Table Section -->


    <!-- Dados do budget totais -->
    <div class="mt-8 flex sm:justify-end">
        <div class="w-full max-w-2xl sm:text-end space-y-2">
            <!-- Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Subotal:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->subtotal, 2, ',', '.') }} €</dd>
                </dl>



                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->tax_value, 2, ',', '.') }} €</dd>
                </dl>
                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                    <dd class="col-span-2 font-boldtext-gray-800 dark:text-neutral-200">{{ number_format($budget->total, 2, ',', '.') }} €</dd>
                </dl>

            </div>
            <!-- End Grid -->
        </div>
    </div>
    <!-- End Flex -->
</div>
<!-- End Invoice -->
