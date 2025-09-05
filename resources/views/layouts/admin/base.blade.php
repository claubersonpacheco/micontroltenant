<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- SEO Meta -->
        <x-seo-meta
            :title="$tenantSettings->title ?? 'MiControl' . ' - ' . ($title ?? 'Bienvenido')"
            :description="$tenantSettings->description ?? 'MiControl es la herramienta online para profesionales que necesitan crear, enviar y gestionar presupuestos de manera rápida y profesional. Ahorra tiempo y gana más clientes.'"
            :keywords="$tenantSettings->keywords ?? 'presupuestos online, herramienta para presupuestos, crear presupuestos profesionales, gestión de presupuestos para autónomos, software de presupuestos'"
            :author="$tenantSettings->author ?? 'Mi Control'"
            :image="asset($tenantSettings->logo ?? 'images/logo-micontrol.png')"
        />


        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset( setting()->favicon ?? 'images/favicon.ico' ) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @yield('body')

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WXD7PCBD5S"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-WXD7PCBD5S');
        </script>
    </body>
</html>
