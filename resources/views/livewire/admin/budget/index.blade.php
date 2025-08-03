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
                                    Budget
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    Gerencie as configurações da aplicação.
                                </p>
                            </div>

                            <div class="inline-flex gap-x-2">
                                <a href="{{ route('budget.create') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                    <svg class="shrink-0 size-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 5v14M5 12h14" />
                                    </svg>
                                    Adicionar
                                </a>
                            </div>
                        </div>
                        <!-- Fim do Cabeçalho -->

                        <!-- Tabela -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">#</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">Criado</th>
                                <th class="px-6 py-3 text-right"></th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse($this->rows as $row)
                                <tr>
                                    <td class="px-6 py-3">{{ $row->id }}</td>
                                    <td class="px-6 py-3">{{ $row->name }}</td>
                                    <td class="px-6 py-3">{{ $row->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-3 text-right">
                                        <a title="Editar"
                                           class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                           href="{{ route('budget.edit', $row->id) }}">
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
                                           wire:click="delete('{{ $row->id }}')"
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
                                            <!-- End Icon -->
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


