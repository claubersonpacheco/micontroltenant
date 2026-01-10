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
    <link rel="shortcut icon" href="{{ asset( setting()->favicon ?? 'images/icon.svg' ) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Fallback styles para garantir legibilidade mesmo sem Tailwind */
        :root{--bg:#f7f7fb;--card:#ffffff;--accent:#0b74da;--text:#222}
        body{font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:var(--bg); color:var(--text); margin:0; padding:24px}
        /* As classes Tailwind/Preline são preferíveis; estes estilos são fallback */
        .pc-container{max-width:900px;margin:24px auto;padding:28px;background:var(--card);border-radius:12px;box-shadow:0 6px 22px rgba(20,20,50,0.06)}
        h1{color:var(--accent);margin-top:0}
        h2{margin-bottom:6px}
        p, li{line-height:1.6}
        code{background:#eef2ff;padding:2px 6px;border-radius:6px;font-size:0.95em}
        pre{white-space:pre-wrap}
        .muted{color:#666;font-size:0.95em}
        footer{margin-top:28px;font-size:0.95em;color:#555}
        .placeholder{background:linear-gradient(90deg,#f0f8ff,#fbfbff);padding:6px 8px;border-radius:6px;font-weight:600}
        .btn-primary{display:inline-block;padding:10px 14px;border-radius:8px;background:var(--accent);color:#fff;text-decoration:none;margin-top:12px}
    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NGW8R7KR');</script>
    <!-- End Google Tag Manager -->


    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}

        // Configuração inicial (nega tudo por padrão até o usuário escolher)
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'analytics_storage': 'denied',
            'personalization_storage': 'denied',
            'functionality_storage': 'denied',
            'security_storage': 'granted' // recomendado manter segurança sempre ativo
        });
    </script>
</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGW8R7KR"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@yield('body')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>

<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            palette: {
                popup: { background: "#000" },
                button: { background: "#f1d600" }
            },
            type: "opt-in", // só dispara se o usuário aceitar
            content: {
                message: "Usamos cookies para melhorar sua experiência.",
                allow: "Aceitar",
                deny: "Recusar",
                link: "Saiba mais",
                href: "/politica-de-privacidade"
            },
            onStatusChange: function(status) {
                if (this.hasConsented()) {
                    // Usuário aceitou → atualiza consentimento
                    gtag('consent', 'update', {
                        'ad_storage': 'granted',
                        'analytics_storage': 'granted',
                        'personalization_storage': 'granted',
                        'functionality_storage': 'granted'
                    });
                } else {
                    // Usuário recusou → mantém negado
                    gtag('consent', 'update', {
                        'ad_storage': 'denied',
                        'analytics_storage': 'denied',
                        'personalization_storage': 'denied',
                        'functionality_storage': 'denied'
                    });
                }
            }
        });
    });
</script>


</body>
</html>
