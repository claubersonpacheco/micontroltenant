@props([
    'title' => config('app.name'),
    'description' => 'Descrição padrão do site',
    'keywords' => '',
    'author' => 'Nome da Empresa',
    'image' => asset('images/og-default.jpg'),
    'url' => url()->current(),
    'locale' => str_replace('_', '-', app()->getLocale())
])

<!-- Title -->
<title>{{ $title }}</title>

<!-- Meta padrão -->
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $author }}">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ $locale }}">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

<!-- Canonical -->
<link rel="canonical" href="{{ $url }}">

<!-- Theme color -->
<meta name="theme-color" content="#ffffff">
