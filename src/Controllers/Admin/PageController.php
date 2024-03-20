<?php

namespace Onjoakimsmind\Arc\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Onjoakimsmind\Arc\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin::pages.pages.index', ['pages' => $pages]);
    }

    public function show(string $id)
    {
        $page = Page::find($id);
        return view('admin::pages.pages.edit', ['page' => $page]);
    }

    public function create()
    {
        $page = Page::create([
            'title' => 'New Page',
            'slug' => 'new-page',
        ]);

        return redirect()->route('admin::pages.pages.edit', ['id' => $page->id]);
    }
}
