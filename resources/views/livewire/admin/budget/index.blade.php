<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Card: Header e Ações -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

                        <!-- Cabeçalho -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    {{ __("Budget") }}
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Gerencie as configurações da aplicação.
                                </p>
                            </div>

                            <div class="inline-flex gap-x-2">
                                <a href="{{ route('budget.create') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">#</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Name") }}</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Customer") }}</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Date") }}</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Status") }}</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Value") }}</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                    {{ __("Created") }}
                                </th>
                                <th class="px-6 py-3 text-right"></th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse($this->rows as $row)
                                <tr>
                                    <td class="px-6 py-3">{{ $row->id }}</td>
                                    <td class="px-6 py-3">{{ $row->name }}</td>
                                    <td class="px-6 py-3">{{ $row->customer->name }}</td>
                                    <td class="px-6 py-3">{{ $row->date->format('d/m/Y') }}</td>
                                    <td class="px-6 py-3">
                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                          <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                          </svg>
                                          {{ $row->latestStatus?->statusLabel ?? '-' }}
                                        </span>

                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $row->summary_sum_gross_total !== null
                                            ? number_format($row->summary_sum_gross_total, 2)
                                            : '—' }}
                                    </td>
                                    <td class="px-6 py-3">{{ $row->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-3 text-right">
                                        <div class="flex items-center justify-end gap-2">

                                            <!-- Items -->
                                            <a title="{{ __('Items') }}"
                                               class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                                               href="{{ route('budget.item.show', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                                </svg>
                                            </a>

                                            <!-- Expense -->
                                            <a title="{{ __('Expense') }}"
                                               class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                                               href="{{ route('expense.budget.listing', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 11.625h4.5m-4.5 2.25h4.5m2.121 1.527c-1.171 1.464-3.07 1.464-4.242 0-1.172-1.465-1.172-3.84 0-5.304 1.171-1.464 3.07-1.464 4.242 0M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                            </a>

                                            <!-- Entry -->
                                            <a title="{{ __('Entry') }}"
                                               class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                                               href="{{ route('entry.budget.listing', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                                </svg>
                                            </a>

                                            <!-- Edit -->
                                            <a title="{{ __('Edit') }}"
                                               class="inline-flex items-center justify-center w-[46px] h-[46px] rounded-full border-4 border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                                               href="{{ route('budget.edit', $row->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                </svg>
                                            </a>

                                            <!-- Delete -->
                                            <livewire:admin.budget.delete :budget="$row" :key="uniqid('', true)" @deleted="$refresh" />

                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-3 text-center text-sm text-gray-500 dark:text-neutral-400">
                                        Nenhum registro encontrado.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- Fim da Tabela -->

                        <!-- Rodapé da Tabela -->
                        <div class="px-6 py-4 flex justify-between items-center border-t border-gray-200 dark:border-neutral-700">
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
</div>

