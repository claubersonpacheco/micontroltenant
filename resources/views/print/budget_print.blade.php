<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto - {{ $budget->customer->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            @page {
                size: A4;
                margin: 0mm;
            }

            body {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }

            .print-only {
                display: block !important;
                position: absolute;
                top: 0;
                left: 0;
                width: 210mm;
                height: 297mm;
            }

            h3, th {
                font-size: 14px;
            }

            h2 {
                font-size: 13px;
            }

            p, td {
                font-size: 12px;
            }
        }

        .print-only {
            display: none;
        }
    </style>

</head>
<body>
@php use App\Services\BunnyServices; @endphp

<div class="max-w-4xl mx-auto bg-white p-8 border rounded-lg">
    <div class="no-print mb-6">
        <div class="flex items-center gap-3">
            <!-- Botão Imprimir -->
            <button
                onclick="window.print()"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-md hover:bg-blue-700 transition"
            >
                <!-- Ícone Print -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 9V2h12v7M6 18h12v4H6v-4zM6 14H4a2 2 0 01-2-2v-2a2 2 0 012-2h16a2 2 0 012 2v2a2 2 0 01-2 2h-2"/>
                </svg>
                Imprimir
            </button>

            <!-- Botão Voltar -->
            <button
                onclick="history.back()"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-md hover:bg-gray-300 transition"
            >
                <!-- Ícone Voltar -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7 7-7M3 12h18"/>
                </svg>
                Voltar
            </button>
        </div>
    </div>

    <div class="flex justify-between items-center">


        <div>
            <h1 class="text-3xl font-bold">Presupuesto</h1>
            <p class="text-gray-600">Presupuesto #{{ $budget->code }}</p>
        </div>
        <div class="text-right">

            @if(!empty($setting->logo_impress))
                <img class="w-[300px] h-auto ms-auto" src="{{ BunnyServices::url($setting->logo_impress) }}" alt="{{ $setting->title }}">
            @else
                <h2 class="text-xl font-semibold">{{ $setting->title }}</h2>
            @endif
            <p>{{ $setting->address }}</p>
            <p>{{ $setting->city }} - {{ $setting->postal_code }}</p>
            <p>{{ $setting->email }}</p>
            <p>{{ $setting->whatsapp }}</p>
            <p>NIF: {{ $setting->document }}</p>
        </div>
    </div>

    <fieldset class="mt-8 grid grid-cols-2 gap-8 border py-2 px-3">

        <legend class="fieldset-legend">Cliente</legend>
        <div>
            <p><b>Nombre:</b> {{ $budget->customer->name }}</p>
            <p><b>Dni/Nif:</b> {{ $budget->customer->document }}</p>
            <p><b>Direccíon:</b> {{ $budget->customer->address }}</p>
            <p><b>Correo eletronico:</b> {{ $budget->customer->email }}</p>
        </div>
        <div class="text-left space-y-4">
            <!-- Linha de datas -->
            <div class="flex justify-start space-x-8">
                <div>
                    <p><b>{{ __('Date Budget') }}:</b> {{ \Carbon\Carbon::parse($budget->date)->format('d/m/Y') }}</p>
                    <p><b>{{ __('Date Expirate') }}:</b> {{ \Carbon\Carbon::parse($budget->expirate)->format('d/m/Y') }}
                    </p>
                    <p><b>{{ __('Validate') }}:</b> {{ $budget->total_expirate }}</p>
                </div>

            </div>
        </div>

    </fieldset>

    <table class="min-w-full mt-8 border-collapse">
        <thead>
        <tr class="bg-gray-200">
            @if($budget->filter->show_service)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Service') }}</th>
            @endif
            @if($budget->filter->show_description)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 max-w-[420px] ">{{ __('Description') }}</th>
            @endif
            @if($budget->filter->show_qtd)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Quantity') }}</th>
            @endif
            @if($budget->filter->show_price)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Unit Price') }}</th>
            @endif
            @if($budget->filter->show_tax)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Tax') }}</th>
            @endif
            @if($budget->filter->show_sub_total)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Sub Total') }}</th>
            @endif
            @if($budget->filter->show_tax_value)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Tax Value') }}</th>
            @endif
            @if($budget->filter->show_total)
                <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Total') }}</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($budget->items as $item)
            <tr class="border-t">
                @if($budget->filter->show_service)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {!! ($item->total == 0)? '<b>'.$item->product->name.'</b>':$item->product->name !!}
                    </td>
                @endif
                @if($budget->filter->show_description)
                    <td class="py-2 px-2 max-w-[420px]  {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {!! $item->description !!}
                    </td>
                @endif
                @if($budget->filter->show_qtd)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': $item->quantity }}
                    </td>
                @endif
                @if($budget->filter->show_price)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': number_format($item->price, 2, ',', '.') }}
                    </td>
                @endif
                @if($budget->filter->show_tax)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': $item->tax .' %' }}
                    </td>
                @endif
                @if($budget->filter->show_sub_total)
                    <td class="py-2 px-2 text-end {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '':  number_format($item->subtotal, 2, ',', '.').' €' }}
                    </td>
                @endif

                @if($budget->filter->show_tax_value)
                    <td class="py-2 px-2 text-end {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': number_format($item->tax_value, 2, ',', '.').' €' }}
                    </td>
                @endif
                @if($budget->filter->show_total)
                    <td class="py-2 px-2 text-end {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': number_format($item->total, 2, ',', '.').' €' }}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Aqui começam as 3 caixas -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-8">
        <div class="bg-gray-200 col-span-2 p-4 border-collapse ">
            <h3 class="font-semibold ">Observacion</h3>
            <p class="text-gray-700">{!!$budget->description !!}</p>

        </div>
        <div class="bg-gray-200 p-4 border-collapse ">
            <!-- Flex -->
            <div class="flex sm:justify-end">
                <div class="w-full max-w-2xl sm:text-end space-y-2">
                    <!-- Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        @if($budget->filter->show_sub_total)
                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Subotal:</dt>
                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">
                                    {{ number_format($budget->summary?->items_subtotal ?? 0, 2, ',', '.') }} €
                                </dd>
                            </dl>
                        @endif

                        @if($budget->filter->show_tax_value)
                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>
                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200"> {{ number_format($budget->summary?->items_tax_total ?? 0, 2, ',', '.') }} €
                                </dd>
                            </dl>
                        @endif

                        @if($budget->filter->show_total)
                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200"> {{ number_format($budget->summary?->gross_total ?? 0, 2, ',', '.') }}
                                    €
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
</div>
</body>
</html>
