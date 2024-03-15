<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page->title }} - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

    @vite(['themes/Arc/css/app.scss', 'themes/Arc/js/app.js'])
    @if ($page->style)
        <style>
            {{ $page->style ?? null }}
        </style>
    @endif
    <script>
        const slug = "{{ $page->title }}"
    </script>
</head>

<body class="antialiased">
    <section class="hero">
    </section>
