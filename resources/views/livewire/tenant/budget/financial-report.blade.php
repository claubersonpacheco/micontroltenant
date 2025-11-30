<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
<div class="p-6 space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            🧾 Financial Report — {{ $budget->name ?? 'Unnamed Budget' }}
        </h2>
    </div>

    @if ($totals)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Each card -->
            <x-report-card label="Subtotal" :value="$totals->items_subtotal" icon="ph:coins-duotone" color="blue" />
            <x-report-card label="Tax Total (VAT)" :value="$totals->items_tax_total" icon="ph:receipt-duotone" color="amber" />
            <x-report-card label="Expenses" :value="$totals->expenses_total" icon="ph:credit-card-duotone" color="rose" />
            <x-report-card label="Received Payments" :value="$totals->entries_total" icon="ph:wallet-duotone" color="emerald" />
            <x-report-card label="Gross Total" :value="$totals->gross_total" icon="ph:chart-bar-duotone" color="cyan" />
            <x-report-card label="Net Total" :value="$totals->net_total" icon="ph:chart-line-duotone" color="indigo" />
            <x-report-card label="Difference" :value="$totals->difference_total" icon="ph:arrows-left-right-duotone" color="orange" />
            <x-report-card label="Final Balance" :value="$totals->final_balance" icon="ph:hand-coins-duotone" color="green" />
            <x-report-card label="Tax Due (VAT to Government)" :value="$totals->iva_hacienda ?? 0" icon="ph:bank-duotone" color="yellow" />
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-400">No financial data available for this budget yet.</p>
    @endif
</div>
    </div>
</div>
