<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('admin') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('admin') }}">

        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" />
        </svg>
        {{ __('Dashboard') }}
    </a>
</li>

<hr class="border-gray-300 dark:border-neutral-500">


<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('tenant.index') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('tenant.index') }}">

        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
        </svg>
        {{ __('Tenants') }}
    </a>
</li>



<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('category.index') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('category.index') }}">

        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
        </svg>
        {{ __('Category') }}
    </a>
</li>

<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('product.index') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('product.index') }}">

        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
        </svg>
        {{ __('Service') }}
    </a>
</li>

<div class="py-3 flex items-center text-sm text-gray-800 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:after:border-neutral-600">
    {{ __('Configurations') }}</div>

<li><a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200" href="#">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
        </svg>
        Documentation
    </a>
</li>

<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('setting.index') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('setting.index') }}">

        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
        </svg>
        {{ __('Setting') }}
    </a>
</li>

<li>
    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg text-gray-800
                            {{ request()->routeIs('user.index') ? 'bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-white' : 'text-gray-400 hover:bg-gray-50' }}"
       href="{{ route('user.index') }}">


        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
        </svg>
        Users
    </a>
</li>
