<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst(request()->segment(2)) }} - {{ config('app.name') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('dist/app.css', 'vendor/arc') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6" />

    <meta name="description" content="Admin One - Arc">

</head>

<body>

    <div id="app">
        @if (!request()->is('admin/pages/*'))
            <x-admin::nav />
        @endif
        @if (request()->is('admin/pages/*'))
            <x-admin::PageControl id="{{ request()->segment(3) }}" />
        @endif
        <x-admin::sidebar />
