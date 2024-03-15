@include('admin::partials.header')


<!-- Main content -->

<div class="p-4">
    <div class="rounded overflow-hidden shadow-lg bg-white">

        <div class="px-6 pt-4 pb-2">
            <div class="w-full flex flex-col">
                <div class="table-header w-full flex">
                    <div class="row w-full flex flex-row justify-between">
                        <div class="table-column">
                            <h2 class="text-xl font-semibold text-gray-800">Page</h2>
                        </div>
                        <div class="table-column">
                            <h2 class="text-xl font-semibold text-gray-800">Status</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body w-full flex flex-row justify-between">
                    @foreach ($pages as $page)
                        <div class="row w-full flex flex-row justify-between">
                            <div class="table-column">
                                <a href="{{ route('admin.pages.show', ['page' => $page->slug]) }}"
                                    class="font-semibold text-gray-800">{{ $page->title }}</a>
                            </div>
                            <div class="table-column">
                                <span class="font-semibold text-gray-800">{{ $page->title }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin::partials.footer')
