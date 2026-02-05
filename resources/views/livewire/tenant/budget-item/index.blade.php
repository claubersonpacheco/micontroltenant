<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Card -->
                <div class="flex flex-col border border-gray-200 rounded-xl dark:border-neutral-800">
                    <a href="{{ route('tenant.invoice.create.customer', $budget->id) }}">
                        <div class="p-4 md:p-5">
                            <div class="flex items-center gap-x-2">
                                <p class="text-sm font-semibold text-gray-500 dark:text-neutral-500">
                                    {{ __('Generate') }}
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                                The number of domains
                              </span>
                                    </div>
                                </div>
                            </div>

                            <h3 class="mt-2 text-2xl sm:text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                                <span class="font-semibold">Invoice</span>
                            </h3>
                        </div>
                    </a>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col border border-gray-200 rounded-xl dark:border-neutral-800">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-sm font-semibold text-gray-500 dark:text-neutral-500">
                                Current Builds
                            </p>
                        </div>

                        <h3 class="mt-2 text-2xl sm:text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            <span class="font-semibold">1</span> <span class="text-gray-500 dark:text-neutral-500">/ 1</span>
                        </h3>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="flex flex-col border border-gray-200 rounded-xl dark:border-neutral-800">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-sm font-semibold text-gray-500 dark:text-neutral-500">
                                Requests
                            </p>
                            <div class="hs-tooltip">
                                <div class="hs-tooltip-toggle">
                                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                                        The number of requests your Deployments have received.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <h3 class="mt-2 text-2xl sm:text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                            <span class="font-semibold">10</span> <span class="text-gray-500 dark:text-neutral-500">/ 10</span>
                        </h3>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card status-->

                <div class="flex flex-col border {{ $budget->latestStatus?->status_classes }} border-gray-200 rounded-xl dark:border-neutral-800">
                    <a href="javascript:void(0)"
                       x-data
                       wire:click="$dispatch('open-modal', { name: 'edit-status' }); $dispatch('edit-status', { id: {{ $budget->id }} })">

                        <div class="p-4 md:p-5">
                            <div class="flex items-center gap-x-2">
                                <p class="text-sm font-semibold text-gray-500 dark:text-neutral-500">
                                    Status
                                </p>
                                <div class="hs-tooltip">
                                    <div class="hs-tooltip-toggle">
                                        <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs dark:bg-neutral-700" role="tooltip">
                                                {{ $budget->latestStatus?->comments ?? 'Sin comentarios' }}
                                            </span>
                                    </div>
                                </div>


                            </div>

                            <div class="flex items-center justify-between">
                                <h3 class="mt-2 text-2xl sm:text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                                    <span class="font-semibold">{{ $budget->latestStatus?->status_label ?? 'Sin estado' }}</span>
                                </h3>

                            </div>
                        </div>
                    </a>

                </div>


                <!--modal -->

                <!-- end modal -->
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Section -->
        <!-- Invoice -->
        <div class="px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">

            <!--header-->
            @include('livewire.tenant.budget-item.partial.header')
            <!-- end header -->

            <div class="flex flex-col mt-6">
                <!-- Table Section Items-->
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
                                        @if(!empty($selectedItems))
                                            <button  wire:click="deleteSelected"
                                                     onclick="confirm('Tem certeza que deseja excluir os itens selecionados?') || event.stopImmediatePropagation()"
                                                     class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            >
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M3 6h18"/>
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                                </svg>
                                                {{ __('Delete Selected') }} ({{ count($selectedItems) }})
                                            </button>
                                        @endif
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                           href="{{ route('tenant.budget.print', $budget->id ) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>

                                            {{__('View')}}
                                        </a>


                                        <!-- filter-->
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                            <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                                <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                                                Filter
                                                <span class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-neutral-700 dark:text-neutral-300">
                                              {{ $this->countFiltered() }}
                                            </span>
                                            </button>

                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                                                <div class="divide-y divide-gray-200 dark:divide-neutral-700">

                                                    <label for="filter-showService" class="flex py-2.5 px-3">
                                                        <input wire:model="showService"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showService"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Service') }}</span>
                                                    </label>

                                                    <label for="filter-showDescription" class="flex py-2.5 px-3">
                                                        <input wire:model="showDescription"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showDescription"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Description') }}</span>
                                                    </label>

                                                    <label for="filter-showQtd" class="flex py-2.5 px-3">
                                                        <input wire:model="showQtd"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showQtd"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Quantity') }}</span>
                                                    </label>

                                                    <label for="filter-showPrice" class="flex py-2.5 px-3">
                                                        <input wire:model="showPrice"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showPrice"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Price Unit') }}</span>
                                                    </label>

                                                    <label for="filter-showTax" class="flex py-2.5 px-3">
                                                        <input wire:model="showTax"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showTax"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Tax') }}</span>
                                                    </label>

                                                    <label for="filter-showTaxValue" class="flex py-2.5 px-3">
                                                        <input wire:model="showTaxValue"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showTaxValue"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Tax Value') }}</span>
                                                    </label>

                                                    <label for="filter-showSubTotal" class="flex py-2.5 px-3">
                                                        <input wire:model="showSubTotal"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showSubTotal"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('SubTotal') }}</span>
                                                    </label>

                                                    <label for="filter-showTotal" class="flex py-2.5 px-3">
                                                        <input wire:model="showTotal"
                                                               wire:change="atualizationColumns"
                                                               id="filter-showTotal"
                                                               type="checkbox"
                                                               class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Total') }}</span>
                                                    </label>

                                                </div>
                                            </div>



                                        </div>
                                        <!-- end filter -->

                                            <div class="inline-flex gap-x-2">
                                            <!--add item-->
                                            <a href="javascript:void(0)"
                                               x-data
                                               wire:click="$dispatch('open-modal', { name: 'create-item' }); $dispatch('create-item', { id: {{ $budget->id }} })"
                                               class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            <!-- Icon -->
                                                {{ __('Add') }}
                                                <!-- End Icon -->
                                            </a>
                                            <!--end add item-->
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full table-fixed divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>
                                    <th class="px-6 py-3 text-start w-[40px]">
                                        <label for="hs-at-with-checkboxes-main" class="flex">
                                            <input type="checkbox"
                                                   wire:click="toggleSelectAll"
                                                   @if(count($this->rows) > 0 && count($selectedItems) === count($this->rows)) checked @endif
                                                   class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                   id="hs-at-with-checkboxes-main">
                                            <span class="sr-only">Checkbox</span>
                                        </label>
                                    </th>

                                    <th class="px-6 py-3 text-start w-[40px]">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                {{ __('Ord') }}
                                            </span>
                                        </div>
                                    </th>

                                    @if($showService)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __('Service') }}</span>
                                        </th>
                                    @endif

                                    @if($showDescription)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __('Description') }}</span>
                                        </th>
                                    @endif

                                    @if($showQtd)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Quantity") }}</span>
                                        </th>
                                    @endif

                                    @if($showPrice)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Price Unit") }}</span>
                                        </th>
                                    @endif

                                    @if($showTax)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Tax") }}</span>
                                        </th>
                                    @endif

                                    @if($showSubTotal)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("SubTotal") }}</span>
                                        </th>
                                    @endif

                                    @if($showTaxValue)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Tax value") }}</span>
                                        </th>
                                    @endif

                                    @if($showTotal)
                                        <th class="px-6 py-3 text-start flex-1">
                                            <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Total") }}</span>
                                        </th>
                                    @endif

                                    <th class="px-6 py-3 text-center w-[120px]">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">{{ __("Action") }}</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody
                                    x-data
                                    x-init="
                                            new Sortable($el, {
                                                handle: '.handle',
                                                animation: 150,
                                                onEnd: function () {
                                                    let ids = Array.from($el.querySelectorAll('tr')).map(tr => tr.dataset.id);
                                                    $wire.updateItemOrder(ids);
                                                }
                                            })
                                        "
                                    class="divide-y divide-gray-200 dark:divide-neutral-700">

                                @forelse($this->rows as $item)
                                    <tr data-id="{{ $item->id }}" wire:key="item-{{ $item->id }}">
                                        <td class="px-6 py-2">
                                            <input type="checkbox"
                                                   value="{{ $item->id }}"
                                                   wire:model.live="selectedItems"
                                                   class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                        </td>

                                        <td class="handle cursor-move px-6 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                                            </svg>
                                        </td>

                                        @if($showService)
                                            <td class="px-6 py-2 flex-1">{{ $item->product->name }}</td>
                                        @endif

                                        @if($showDescription)
                                            <td class="px-6 py-2 flex-1">{{ $item->description }}</td>
                                        @endif

                                        @if($showQtd)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': $item->quantity }}</td>
                                        @endif

                                        @if($showPrice)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': number_format($item->price, 2, ',', '.').'€' }}</td>
                                        @endif

                                        @if($showTax)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': $item->tax }}%</td>
                                        @endif

                                        @if($showSubTotal)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': number_format($item->subtotal, 2, ',', '.').'€' }}</td>
                                        @endif

                                        @if($showTaxValue)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': number_format($item->tax_value, 2, ',', '.').'€' }}</td>
                                        @endif

                                        @if($showTotal)
                                            <td class="px-6 py-2 flex-1">{{ ($item->total == 0)? '': number_format($item->total, 2, ',', '.').'€' }}</td>
                                        @endif

                                        <td class="px-6 py-2 text-end">
                                            <div class="flex items-center justify-end gap-2">
                                                <!-- Edit -->
                                                <a title="Editar"
                                                   wire:click="$dispatch('open-modal', { name: 'edit-item' }); $dispatch('edit-item', { id: {{ $item->id }} })"
                                                   class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <span class="m-1 inline-flex justify-center items-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                             class="w-6 h-6">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <!-- Delete -->
                                                <livewire:tenant.budget-item.delete :budgetItem="$item" :key="uniqid('', true)"
                                                                               @deleted="$refresh" />
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="100%" class="px-6 py-2">
                                            <div class="flex justify-center items-center py-2">
                                                Not found
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <!-- End Table -->
                            <!-- Footer -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                                <div class="inline-flex items-center gap-x-2">
                                    <!-- Paginação -->
                                    <div class="mt-4">
                                        {{ $rows->links() }}
                                    </div>
                                </div>
                                <!-- End Footer -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Table Section -->

                <!-- footer -->
                @include('livewire.tenant.budget-item.partial.footer')
            </div>
        </div>
        <!-- End Invoice -->
    </div>
</div>

