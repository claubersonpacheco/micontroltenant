<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO básico (não precisa de keywords pesadas aqui) -->
    <title>{{ $title ?? 'MiControl - Dashboard' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(setting()->favicon ?? 'images/favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NGW8R7KR');
    </script>
    <!-- End Google Tag Manager -->

    <!-- DataLayer inicial -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function trackEvent(name, params = {}) {
            window.dataLayer.push({
                event: name,
                ...params
            });
        }
    </script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGW8R7KR"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@yield('body')

<script>
    window.addEventListener('livewire:load', () => {
        Livewire.on('track-event', (data) => {
            if (window.dataLayer) {
                dataLayer.push({
                    event: data.name,
                    ...data.params
                });
                console.log("Evento enviado ao GTM:", data);
            }
        });
    });
</script>

</body>
</html>
