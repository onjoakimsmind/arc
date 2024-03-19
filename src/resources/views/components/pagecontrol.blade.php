<div class="flex min-h-16 items-center justify-between border-b border-gray-200 bg-white p-4">
    <div class="flex">
        <label>
            <input class="mx-4 rounded-md border px-4 py-2" type="text" placeholder="Page Title"
                value="{{ $page->title }}">
        </label>
        <label>
            Revision
            <select class="mx-4 rounded-md border px-4 py-2">
                <option value="latest">Latest</option>
                @foreach ($page->revisions as $revision)
                    <option value="{{ $revision->id }}">{{ $revision->created_at }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="flex">
        <button id="publish" class="text-gray-500 focus:text-gray-700 focus:outline-none">
            Publish
        </button>
    </div>
</div>
