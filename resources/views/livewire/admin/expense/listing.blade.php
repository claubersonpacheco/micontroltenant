<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">


        <div class="mb-5 pb-5 border-b border-gray-200 dark:border-neutral-700">
            <div class="w-full flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 ">

                @if ($totals)
                    <x-report-card label="{{ __('Total Expenses') }}" :value="$totals->expenses_total"
                                   icon="ph:credit-card-duotone" color="yellow"/>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No financial data available for this budget yet.</p>
                @endif

                <div class="flex flex-wrap gap-2">
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                       href="{{ route('email.send', $budget->id ) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                        {{ __('Send Email') }}
                    </a>

                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                       href="{{ route('budget.pdf', $budget->id ) }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" x2="12" y1="15" y2="3"/>
                        </svg>
                        {{ __('Budget Pdf') }}
                    </a>

                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                       href="{{ route('expense.view', $budget->id ) }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect width="12" height="8" x="6" y="14"/>
                        </svg>
                        {{ __('View') }}
                    </a>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                       href="{{ route('expense.create', $budget->id ) }}">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect width="12" height="8" x="6" y="14"/>
                        </svg>
                        {{ __('Print') }}
                    </a>
                </div>

            </div>
        </div>

        <!-- Card: Header e Ações -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

                        <!-- Cabeçalho -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    {{ "#".$budget->code." - ".$budget->name }}
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    {{ __("Manage your expenses") }}
                                </p>
                            </div>


                            <div class="inline-flex gap-x-2">
                                <!-- filter-->
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                    <button id="hs-as-table-table-filter-dropdown" type="button"
                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <svg class="shrink-0 size-3.5 text-gray-800 dark:text-neutral-200"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/>
                                            <path d="M7 12h10"/>
                                            <path d="M10 18h4"/>
                                        </svg>
                                        Filter
                                        <span
                                            class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-neutral-700 dark:text-neutral-300">
                                              {{ $this->countFiltered() }}
                                            </span>
                                    </button>

                                    <div
                                        class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div class="divide-y divide-gray-200 dark:divide-neutral-700">

                                            <label for="filter-showCode" class="flex py-2.5 px-3">
                                                <input wire:model="showCode" wire:change="atualizationColumns"
                                                       id="filter-showCode"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Code') }}</span>
                                            </label>

                                            <label for="filter-showDate" class="flex py-2.5 px-3">
                                                <input wire:model="showDate" wire:change="atualizationColumns"
                                                       id="filter-showDate"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Date') }}</span>
                                            </label>

                                            <label for="filter-showName" class="flex py-2.5 px-3">
                                                <input wire:model="showName" wire:change="atualizationColumns"
                                                       id="filter-showName"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Name') }}</span>
                                            </label>

                                            <label for="filter-showDescription" class="flex py-2.5 px-3">
                                                <input wire:model="showDescription" wire:change="atualizationColumns"
                                                       id="filter-showDescription"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Description') }}</span>
                                            </label>

                                            <label for="filter-showAmount" class="flex py-2.5 px-3">
                                                <input wire:model="showAmount" wire:change="atualizationColumns"
                                                       id="filter-showAmount"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Amount') }}</span>
                                            </label>

                                            <label for="filter-showMethod" class="flex py-2.5 px-3">
                                                <input wire:model="showMethod" wire:change="atualizationColumns"
                                                       id="filter-showMethod"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Method Pay') }}</span>
                                            </label>

                                            <label for="filter-showInvoiceNumber" class="flex py-2.5 px-3">
                                                <input wire:model="showInvoiceNumber" wire:change="atualizationColumns"
                                                       id="filter-showInvoiceNumber"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Invoice Number') }}</span>
                                            </label>

                                            <label for="filter-showFileName" class="flex py-2.5 px-3">
                                                <input wire:model="showFileName" wire:change="atualizationColumns"
                                                       id="filter-showFileName"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('File Name') }}</span>
                                            </label>

                                            <label for="filter-showFilePath" class="flex py-2.5 px-3">
                                                <input wire:model="showFilePath" wire:change="atualizationColumns"
                                                       id="filter-showFilePath"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('File') }}</span>
                                            </label>

                                        </div>
                                    </div>
<div
                                        class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-20 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="hs-as-table-table-filter-dropdown">
                                        <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                            <label for="showCode" class="flex py-2.5 px-3">
                                                <input wire:model="showCode" wire:change="atualizationColumns"
                                                       id="showCode"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Code') }}</span>
                                            </label>

                                            <label for="showDate" class="flex py-2.5 px-3">
                                                <input wire:model="showDate" wire:change="atualizationColumns"
                                                       id="showDate"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Date') }}</span>
                                            </label>

                                            <label for="showName" class="flex py-2.5 px-3">
                                                <input wire:model="showName" wire:change="atualizationColumns"
                                                       id="showName"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Name') }}</span>
                                            </label>

                                            <label for="showDescription" class="flex py-2.5 px-3">
                                                <input wire:model="showDescription" wire:change="atualizationColumns"
                                                       id="showDescription"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Description') }}</span>
                                            </label>

                                            <label for="showAmount" class="flex py-2.5 px-3">
                                                <input wire:model="showAmount" wire:change="atualizationColumns"
                                                       id="showAmount"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Amount') }}</span>
                                            </label>

                                            <label for="showMethod" class="flex py-2.5 px-3">
                                                <input wire:model="showMethod" wire:change="atualizationColumns"
                                                       id="showMethod"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Method Pay') }}</span>
                                            </label>

                                            <label for="showInvoiceNumber" class="flex py-2.5 px-3">
                                                <input wire:model="showInvoiceNumber" wire:change="atualizationColumns"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                       id="showInvoiceNumber">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('Invoice Number') }}</span>
                                            </label>

                                            <label for="showFileName" class="flex py-2.5 px-3">
                                                <input wire:model="showFileName" wire:change="atualizationColumns"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                       id="showFileName">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('File Name') }}</span>
                                            </label>

                                            <label for="showFilePath" class="flex py-2.5 px-3">
                                                <input wire:model="showFilePath" wire:change="atualizationColumns"
                                                       type="checkbox"
                                                       class="shrink-0 mt-0.5 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                       id="showFilePath">
                                                <span
                                                    class="ms-3 text-sm text-gray-800 dark:text-neutral-200">{{ __('File') }}</span>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <!-- end filter -->
                                <a href="{{ route('expense.create', $budget->id ) }}"
                                   class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    {{ __("New") }}
                                </a>
                            </div>
                        </div>
                        <!-- Fim do Cabeçalho -->

                        <!-- Tabela -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                @if($showCode)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __('Code') }}</th>
                                @endif
                                @if($showDate)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Date") }}</th>
                                @endif
                                @if($showName)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Name") }}</th>
                                @endif
                                @if($showDescription)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Description") }}</th>
                                @endif

                                @if($showMethod)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Method Pay") }}</th>
                                @endif
                                @if($showInvoiceNumber)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Invoice Number") }}</th>
                                @endif


                                @if($showFileName)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("File Name") }}
                                    </th>
                                @endif

                                @if($showFilePath)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("File") }}
                                    </th>
                                @endif
                                @if($showAmount)
                                    <th class="px-6 py-3 text-start flex-1">
                                        {{ __("Amount") }}</th>
                                @endif
                                    <th class="px-6 py-3 text-center w-[120px]">{{ __('Actions') }}</th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse($this->rows as $row)
                                <tr>
                                    @if($showCode)
                                        <td class="px-6 py-3  flex-1">{{ $row->code }}</td>
                                    @endif
                                    @if($showDate)
                                        <td class="px-6 py-3  flex-1">{{ $row->date->format('d/m/Y') }}</td>
                                    @endif
                                    @if($showName)
                                        <td class="px-6 py-3  flex-1">{{ $row->name }}</td>
                                    @endif
                                    @if($showDescription)
                                        <td class="px-6 py-3  flex-1">{!! $row->showDescription !!}</td>
                                    @endif

                                    @if($showMethod)
                                        <td class="px-6 py-3  flex-1">{{ $row->method }}</td>
                                    @endif

                                    @if($showInvoiceNumber)
                                        <td class="px-6 py-3  flex-1">
                                            @if($row->invoice === false)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"/>
                                                </svg>
                                            @else
                                                {{ $row->invoice_number }}
                                            @endif
                                        </td>
                                    @endif

                                    @if($showFileName)
                                        <td class="px-6 py-3  flex-1">
                                            @if($row->invoice === false)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"/>
                                                </svg>
                                            @else

                                                {{ $row->filename }}</td>
                                          @endif
                                        @endif


                                    @if($showFilePath)
                                        <td class="px-6 py-3  flex-1">
                                            @if($row->invoice === false)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"/>
                                                </svg>
                                            @else
                                                <a href="{{ $row->file_path }}" target="_blank">
                                            <span
                                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                  <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                                       height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                  </svg>
                                                  Ver Fatura
                                                </span>
                                                </a>
                                            @endif
                                        </td>
                                    @endif
                                    @if($showAmount)
                                        <td class="px-6 py-3  flex-1">{{ $row->amount }}</td>
                                    @endif

                                    <td class="px-6 py-3 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a title="Editar"
                                               class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                               href="{{ route('expense.edit', $row->id) }}">
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

                                            <a title="Delete"
                                               wire:click="openModal({{ $row->id }})"
                                               class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <span
                                                        class="m-1 inline-flex justify-center items-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                             stroke="currentColor"
                                                             class="w-6 h-6">
                                                          <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                        </svg>
                                                    </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-3 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        {{ __('No records found') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- Fim da Tabela -->

                        <!-- Rodapé da Tabela -->
                        <div
                            class="px-6 py-4 flex justify-between items-center border-t border-gray-200 dark:border-neutral-700">
                            <div class="text-sm text-gray-600 dark:text-neutral-400">
                                Mostrando {{ $this->rows->count() }} de {{ $this->rows->total() }} resultados
                            </div>
                            <div>
                                {{ $this->rows->onEachSide(1)->links() }}
                            </div>
                        </div>
                        <!-- Fim Rodapé -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim do Card -->
    </div>
    @if($showModal)
        @livewire('admin.expense.delete',  ['itemId' => $itemIdToDelete] )
    @endif
</div>



