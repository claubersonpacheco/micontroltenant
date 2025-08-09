<!-- Invoice -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <!-- Grid  -->
    <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">Presupuesto #79857123</h2>
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
                Invoice PDF
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
                Print
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
                        Correo Eletronico:
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
                        Detalle Cliente:
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
                        Documento:
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
                        Codigo cliente:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->customer->code }}
                    </dd>
                </dl>


                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        Data:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        {{ $budget->created_at->format('y/m/Y') }}
                    </dd>
                </dl>

                <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                    <dt class="min-w-36 max-w-50 text-gray-500 dark:text-neutral-500">
                        Validad:
                    </dt>
                    <dd class="font-medium text-gray-800 dark:text-neutral-200">
                        30 dias
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
                    <!-- Header -->
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

                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                   href="#">
                                    View all
                                </a>
                               <livewire:admin.budget.add-item :budget="$budget->id" />
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

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __('Service') }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __('Description') }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __("Quantity") }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __("Price Unit") }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __("Tax") }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __("Value s/ Tax") }}
                                    </span>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                      {{ __("Value Tax") }}
                                    </span>
                                </div>
                            </th>
                            <th colspan="2" scope="col" class="px-6 py-3 text-center">
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


                            <tr>
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
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <div class="flex items-center gap-x-2">
                                        <div class="grow">
                                            <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->product->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->description }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">{{ $item->quantity }}</span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     {{ $item->price }}
                                    </span>
                                </div>
                            </td>
                            <td class="size-px whitespace-nowrap">
                                <div class="px-6 py-2 flex gap-x-1">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     {{ $item->tax }}%
                                    </span>
                                </div>
                            </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2 flex gap-x-1">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     {{ $item->total }}
                                    </span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2 flex gap-x-1">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     {{ $item->total_tax }}
                                    </span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2 flex gap-x-1">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     editar
                                    </span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-2 flex gap-x-1">
                                    <span class="text-sm text-gray-600 dark:text-neutral-400">
                                     excluir
                                    </span>
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

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                        <div class="inline-flex items-center gap-x-2">
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                Showing:
                            </p>
                            <div class="max-w-sm space-y-3">
                                <select
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option selected>9</option>
                                    <option>20</option>
                                </select>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                of 20
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6"/>
                                    </svg>
                                    Prev
                                </button>

                                <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                    Next
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
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
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                </dl>

                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                </dl>

                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">$39.00</dd>
                </dl>

                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Amount paid:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">$2789.00</dd>
                </dl>

                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                    <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Due balance:</dt>
                    <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">$0.00</dd>
                </dl>
            </div>
            <!-- End Grid -->
        </div>
    </div>
    <!-- End Flex -->
</div>
<!-- End Invoice -->
