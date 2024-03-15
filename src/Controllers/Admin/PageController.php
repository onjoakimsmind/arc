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

    public function show(string $slug = 'home')
    {
        $page = Page::where('slug', $slug)->first();
        return view('admin::pages.pages.edit', ['page' => $page]);
    }

    public function create()
    {
        return view('admin::pages.pages.create');
    }
}
