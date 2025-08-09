<div x-data="{ open: false }">
    <!-- Botão para abrir -->
    <button
        type="button"
        @click="open = true"
        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor">
            <path d="M5 12h14"/>
            <path d="M12 5v14"/>
        </svg>
        Adicionar
    </button>

<!--modal-->
    <div
        x-show="open"
        x-transition
        @keydown.escape.window="open = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    >
   <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-basic-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Modal title
                    </h3>
                    <button @click="open = false" type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-basic-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <form id="customer-create" wire:submit.prevent="insert">
                <div class="p-4 overflow-y-auto">
                    <!--table servicios -->


                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                            <!-- SErvice -->
                            <div class="sm:col-span-3">
                                <label for="product_id" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Service') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <select wire:model.live="product_id"
{{--                                        wire:change="selectProduct($event.target.value)"--}}
                                        id="product_id"
                                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                    <option value="">Selecione um produto</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Quantity -->
                            <div class="sm:col-span-3">
                                <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Quantity') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <!-- Input Number -->
                                <div class="bg-white border border-gray-200 rounded-lg dark:bg-neutral-700 dark:border-neutral-700">
                                    <div class="w-full flex justify-between items-center gap-x-1">
                                        <div class="grow py-2 px-3">
                                            <input wire:model="quantity"
                                                   wire:change="calculateTotals"
                                                   type="number"
                                                   class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white" style="-moz-appearance: textfield;"  aria-roledescription="Number field"  data-hs-input-number-input="">
                                        </div>
                                        <div class="flex items-center -gap-y-px divide-x divide-gray-200 border-s border-gray-200 dark:divide-neutral-700 dark:border-neutral-700">
                                            <button type="button" wire:click="decrement()" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Decrease" >
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                </svg>
                                            </button>
                                            <button type="button"wire:click="increment()" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white text-gray-800 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Increase" >
                                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5v14"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->


                                @error('quantity') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <!-- end quantity-->

                            <!-- Description -->
                            <div class="sm:col-span-3">
                                <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Description') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                    <textarea wire:model="description" id="description" placeholder="Product description"
                                              class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                        focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">

                                    </textarea>
                                @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Tax % -->
                            <div class="sm:col-span-3">
                                <label for="tax" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('TAX %') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <select wire:model.live="tax" id="tax"
                                        class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                    <option value="0">0</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="19">19</option>
                                    <option value="21">21</option>
                                </select>
                                @error('tax') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Price -->
                            <div class="sm:col-span-3">
                                <label for="code" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Price') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model.live="price" id="price" type="text"
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Total not iva -->
                            <div class="sm:col-span-3">
                                <label for="total" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Total') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="total" id="total" type="text" readonly
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('total') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- tax -->
                            <div class="sm:col-span-3">
                                <label for="taxValue" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Tax') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="taxValue" id="tax_value" type="text" readonly
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('taxValue') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <!-- Total iva -->
                            <div class="sm:col-span-3">
                                <label for="total_tax" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200">
                                    {{ __('Total Tax') }}
                                </label>
                            </div>
                            <div class="sm:col-span-9">
                                <input wire:model="total_tax" id="total_tax" type="text" readonly
                                       class="py-1.5 px-3 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg
                                  focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">
                                @error('total_tax') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>



                        </div>


                </div>
                    <!--buttons-->
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                    <button type="button" @click="open = false" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-basic-modal">
                        Close
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save
                    </button>
                </div>
                    <!-- end buttons-->

                </form>
            </div>
        </div>
<!--end modal-->
</div>
</div>
