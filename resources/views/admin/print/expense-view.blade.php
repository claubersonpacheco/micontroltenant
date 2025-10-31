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
            <h1 class="text-3xl font-bold">{{ __('Expenses') }}</h1>
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


    </fieldset>

    <table class="min-w-full mt-8 border-collapse">
        <thead>
        <tr class="bg-gray-200">
            @if($budget->filters->show_ex_code)
                <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Code') }}</th>
            @endif
                @if($budget->filters->show_ex_date)
                    <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Date') }}</th>
                @endif
            @if($budget->filters->show_ex_name)
                <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 max-w-[420px] ">{{ __('Name') }}</th>
            @endif
                @if($budget->filters->show_ex_description)
                <th class="py-2 px-2text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Description') }}</th>
            @endif


                @if($budget->filters->show_ex_method)
                <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Method') }}</th>
            @endif
                @if($budget->filters->show_ex_invoice_number)
                <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Invoice Number') }}</th>
            @endif
                @if($budget->filters->show_ex_filename)
                <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Filename') }}</th>
            @endif

                @if($budget->filters->show_ex_amount)
                    <th class="py-2 px-2 text-center sm:sm:text-xs text-[12px] font-medium text-gray-500 uppercase dark:text-neutral-500 ">{{ __('Amount') }}</th>
                @endif

        </tr>


        </thead>
        <tbody>
        @foreach($expenses as $item)

            <tr class="border-t">
                @if($budget->filters->show_ex_code)
                    <td class="py-2 px-2 text-center">
                        {{ $item->code }}
                    </td>
                @endif
                    @if($budget->filters->show_ex_date)
                    <td class="py-2 px-2 max-w-[420px] text-center">
                        {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                    </td>
                @endif
                    @if($budget->filters->show_ex_name)
                    <td class="py-2 px-2 text-center">
                        {{ $item->name }}
                    </td>
                @endif

                    @if($budget->filters->show_ex_description)
                    <td class="py-2 px-2 text-center ">
                        {{ $item->description }}
                    </td>
                @endif


                    @if($budget->filters->show_ex_method)
                    <td class="py-2 px-2 text-center ">
                        {{ $item->method }}
                    </td>
                @endif

                    @if($budget->filters->show_ex_invoice_number)
                        <td class="py-2 px-2 text-center ">
                            {{ $item->invoice_number }}
                        </td>
                    @endif

                    @if($budget->filters->show_ex_filename)
                        <td class="py-2 px-2 text-center ">
                            {{ $item->filename }}
                        </td>
                    @endif
                    @if($budget->filters->show_ex_amount)
                        <td class="py-2 px-2 text-center">
                            {{ number_format($item->amount, 2, ',', '.') }}
                        </td>
                    @endif

            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Aqui começam as 3 caixas -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-8">
        <div class="bg-gray-200 col-span-2 p-4 border-collapse ">
            <h3 class="font-semibold "></h3>
            <p class="text-gray-700"></p>

        </div>
        <div class="bg-gray-200 p-4 border-collapse ">
            <!-- Flex -->
            <div class="flex sm:justify-end">
                <div class="w-full max-w-2xl sm:text-end space-y-2">
                    <!-- Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">

{{--                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">--}}
{{--                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Subotal:</dt>--}}
{{--                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->subtotal, 2, ',', '.') }} €</dd>--}}
{{--                            </dl>--}}

{{--                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">--}}
{{--                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Tax:</dt>--}}
{{--                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->tax_value, 2, ',', '.') }} €</dd>--}}
{{--                            </dl>--}}

                            <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                <dt class="col-span-3 text-gray-500 dark:text-neutral-500">Total:</dt>
                                <dd class="col-span-2 font-medium text-gray-800 dark:text-neutral-200">{{ number_format($budget->summary->expenses_total, 2, ',', '.') }} €</dd>
                            </dl>


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
