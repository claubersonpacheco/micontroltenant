@props(['label', 'value' => 0, 'icon' => 'ph:coins-duotone', 'color' => 'blue'])

<div class="flex flex-col bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700 p-4">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-x-2">
            <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-{{ $color }}-100 text-{{ $color }}-600 dark:bg-{{ $color }}-900/50 dark:text-{{ $color }}-400">
                <iconify-icon icon="{{ $icon }}" class="w-5 h-5"></iconify-icon>
            </span>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $label }}</p>
                <p class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                    €{{ number_format($value, 2, ',', '.') }}
                </p>
            </div>
        </div>
    </div>
</div>
