</div>
</div>

<script src="{{ mix('mix-manifest.json', 'vendor/arc') }}"></script>
<script src="{{ mix('app.js', 'vendor/arc') }}"></script>
@if (request()->is('admin/pages/*'))
    <script>
        const slug = '{{ $page->slug }}';
    </script>
    <script src="{{ mix('page.js', 'vendor/arc') }}"></script>
@endif
</body>

</html>
