@include('admin::partials.header')


<!-- Main content -->

<div class="p-4">
    <div class="overflow-hidden rounded bg-white shadow-lg">

        <div class="px-6 pb-2 pt-4">
            <div class="flex w-full flex-col">
                <div class="table-header flex w-full">
                    <div class="row flex w-full flex-row justify-between">
                        <div class="table-column">
                            <h2 class="text-xl font-semibold text-gray-800">Page</h2>
                        </div>
                        <div class="table-column">
                            <h2 class="text-xl font-semibold text-gray-800">Status</h2>
                        </div>
                    </div>
                </div>
                <div class="table-body flex w-full flex-row justify-between">
                    @foreach ($pages as $page)
                        <div class="row flex w-full flex-row justify-between">
                            <div class="table-column">
                                <a href="{{ route('admin.pages.show', ['id' => $page->id]) }}"
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
