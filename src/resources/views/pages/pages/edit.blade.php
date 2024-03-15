@include('admin::partials.header')
<div id="gjs">

    {!! html_entity_decode($page->content) !!}
</div>
@include('admin::partials.footer')
