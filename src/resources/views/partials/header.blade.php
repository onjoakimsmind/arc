<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ ucfirst(request()->segment(2)) }} - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('dist/app.css', 'vendor/arc') }}">
</head>

<body class="antialiased">
    <div class="flex h-screen bg-gray-100">
        <!-- sidebar -->
        {{-- @include('admin::components.sidebar') --}}
        <x-admin::Sidebar />
        <div class="flex flex-1 flex-col overflow-y-auto">

            @if (!request()->is('admin/pages/*'))
                <x-admin::search />
            @endif
            @if (request()->is('admin/pages/*'))
                <x-admin::PageControl id="{{ request()->segment(3) }}" />
            @endif
