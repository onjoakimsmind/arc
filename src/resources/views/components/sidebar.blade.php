<div class="hidden md:flex flex-col w-64 bg-gray-800">
    <div class="flex items-center justify-center h-16 bg-gray-900">
        <span class="text-white font-bold uppercase">{!! config('app.name') !!}</span>
    </div>
    <div class="flex flex-col justify-between h-full">
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                @foreach ($items as $key => $item)
                    <a href="{{ route($item['route']) }}"
                        class="{{ request()->segment(2) == strtolower($key) ? 'bg-gray-700' : '' }} flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                        <div class="h-6 w-6 mr-2">
                            <span class="{{ $item['icon'] }}"></span>
                        </div>
                        {{ $key }}
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="grid overflow-y-auto justify-self-end">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="/admin" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                    <div class="h-6 w-6 mr-2">
                        <span class="mdi mdi-exit-to-app"></span>
                    </div>
                    Sign out
                </a>
            </nav>
        </div>
    </div>
</div>
