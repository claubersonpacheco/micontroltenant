<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto - {{ $budget->customer->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        h3, th {
            font-size: 14px;
        }

        h2 {
            font-size: 13px;
        }

        p, td {
            font-size: 12px;
        }

        @page {
            margin: 10mm 0mm 10mm 0mm; /* margens: cima, direita, baixo, esquerda */
        }

    </style>


</head>
<body>

<div class="max-w-4xl mx-auto bg-white p-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">Presupuesto</h1>
            <p class="text-gray-600">Presupuesto #{{ $budget->code }}</p>
        </div>
        <div class="text-right">

            @if(!empty($setting->logo_impress) && file_exists(storage_path('app/public/'.$setting->logo_impress)))
                @php
                    $imagePath = storage_path('app/public/'.$setting->logo_impress);
                    $imageBase64 = 'data:image/png;base64,'.base64_encode(file_get_contents($imagePath));
                @endphp

                <img class="w-[300px] h-auto ms-auto" src="{{ $imageBase64 }}" alt="{{ $setting->title }}">
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
                    <p><b>{{ __('Date Expirate') }}:</b> {{ \Carbon\Carbon::parse($budget->expirate)->format('d/m/Y') }}</p>
                    <p><b>{{ __('Validate') }}:</b> {{ $budget->total_expirate }}</p>
                </div>

            </div>
        </div>

    </fieldset>

    <table class="min-w-full mt-8 border-collapse">
        <thead>
            <tr class="bg-gray-200">
                @if($budget->show_service)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Service') }}</th>
                @endif
                @if($budget->show_description)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 max-w-[420px] ">{{ __('Description') }}</th>
                @endif
                @if($budget->show_qtd)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Quantity') }}</th>
                @endif
                @if($budget->show_price)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Unit Price') }}</th>
                @endif
                @if($budget->show_tax)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Tax') }}</th>
                @endif
                @if($budget->show_sub_total)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Sub Total') }}</th>
                @endif
                @if($budget->show_tax_value)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Tax Value') }}</th>
                @endif
                @if($budget->show_total)
                    <th class="py-2 px-2 text-left sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Total') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($budget->items as $item)
            <tr class="border-t">
                @if($budget->show_service)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {!! ($item->total == 0)? '<b>'.$item->product->name.'</b>':$item->product->name !!}
                    </td>
                @endif
                @if($budget->show_description)
                    <td class="py-2 px-2 max-w-[420px]  {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {!! $item->description !!}
                    </td>
                @endif
                @if($budget->show_qtd)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': $item->quantity }}
                    </td>
                @endif
                @if($budget->show_price)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': number_format($item->price, 2, ',', '.') }}
                    </td>
                @endif
                @if($budget->show_tax)
                    <td class="py-2 px-2 {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': $item->tax .' %' }}
                    </td>
                @endif
                @if($budget->show_sub_total)
                    <td class="py-2 px-2 text-end {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '':  number_format($item->subtotal, 2, ',', '.').' €' }}
                    </td>
                @endif

                @if($budget->show_tax_value)
                    <td class="py-2 px-2 text-end {{ ($item->total == 0)? 'bg-gray-300' : '' }}">
                        {{ ($item->total == 0)? '': number_format($item->tax_value, 2, ',', '.').' €' }}
                    </td>
                @endif
                @if($budget->show_total)
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
                        @if($budget->show_sub_total)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Subotal:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->subtotal, 2, ',', '.') }} €</dd>
                        </dl>
                        @endif

                        @if($budget->show_tax_value)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->tax_value, 2, ',', '.') }} €</dd>
                        </dl>
                        @endif

                        @if($budget->show_total)
                        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                            <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                            <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->total, 2, ',', '.') }} €</dd>
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
