@include('partials.header')

<body class="antialiased">
    <div id="gjs">
        {!! html_entity_decode($page->content) !!}
    </div>
</body>

</html>
