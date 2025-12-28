<!-- head  -->
<div class="mb-5 pb-5 border-b border-gray-200 dark:border-neutral-700">
    <div class="w-full flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <!-- Título -->
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ __("Budget") }} #{{ $budget->code }}
        </h2>

        <!-- Links -->
        <div class="flex flex-wrap gap-2">
            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="{{ route('tenant.email.send', $budget->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
                {{ __('Send Email') }}
            </a>

            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                href="{{ route('tenant.budget.pdf', $budget->id) }}">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" x2="12" y1="15" y2="3" />
                </svg>
                {{ __('Budget Pdf') }}
            </a>

            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                href="{{ route('tenant.budget.print', $budget->id) }}">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9" />
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <rect width="12" height="8" x="6" y="14" />
                </svg>
                {{ __('Print') }}
            </a>
        </div>
    </div>
</div>

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
<!-- End head -->
