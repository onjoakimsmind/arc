<?php

namespace Onjoakimsmind\Arc\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Onjoakimsmind\Arc\Helpers\Helper;
use Onjoakimsmind\Arc\Models\Page;

class PageController extends Controller
{
    protected $theme;
    protected $helper;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function show(string $id)
    {
        $page = Page::find($id);
        return view('admin::page', ['page' => $page]);
    }

    public function getHTML(string $id)
    {
        $page = Page::find($id);
        $html = $this->helper->objToHTML($page->content);

        return response($html, 200)->header('Content-Type', 'text/css');
    }

    public function getCSS(string $id)
    {
        $page = Page::find($id);
        return response($page->style, 200)->header('Content-Type', 'text/css');
    }

    public function get(Request $request, string $id)
    {
        $page = Page::find($id);
        $response = [
            'pages' => $page->temp_html,
            'styles' => $page->temp_style
        ];

        return response()->json($response);
    }

    public function update(Request $request, string $id)
    {
        $page = Page::find($id)->first();

        $html = $request->input('html');

        $parsed = $this->helper->htmlToObj($html);
        $page->content = $parsed;
        $page->style = $request->input('styles');

        $page->save();

        return response()->json(['msg' => 'Ok', 'page' => $page]);
    }
}
