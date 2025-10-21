<div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-8">
    <div class="bg-gray-200 col-span-2 p-4 rounded-md">
        <h3 class="font-semibold ">Observación</h3>
        <p class="text-gray-700">{!!$budget->description !!}</p>

    </div>
    <div class="bg-gray-200 p-4 rounded-md">
        <!-- Flex -->
        <div class="flex sm:justify-end">
            <div class="w-full max-w-2xl sm:text-end space-y-2">
                <!-- Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                    @if($showSubTotal)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Subotal:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">

                                {{ number_format($budget->summary?->items_subtotal ?? 0, 2, ',', '.') }} €

                            </dd>
                        </dl>
                    @endif

                    @if($showTaxValue)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">
                                {{ number_format($budget->summary?->items_tax_total ?? 0, 2, ',', '.') }} €
                            </dd>
                        </dl>
                    @endif

                    @if($showTotal)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">
                                {{ number_format($budget->summary?->gross_total ?? 0, 2, ',', '.') }} €
                            </dd>
                        </dl>
                    @endif

                </div>
                <!-- End Grid -->
            </div>
        </div>
        <!-- End Flex -->

    </div>
</div>
