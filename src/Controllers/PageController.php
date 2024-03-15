<?php

namespace Onjoakimsmind\Arc\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use Onjoakimsmind\Arc\Helpers\Helper;

use Onjoakimsmind\Arc\Models\Page;
use Onjoakimsmind\Arc\Models\Theme;

class PageController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function show(string $slug = null)
    {
        $page = Page::where('slug', $slug)->first();
        if(!$page) {
            $page = Page::where('home', 1)->first();
        }
        if($slug == $page->slug && $page->home) {
            return response()->redirectTo('/');
        }
        $html = preg_replace('/<(html|body)[^<]+?>|<\/(html|body)>/', '', $this->helper->objToHTML($page->content));
        $css = $page->style;
        $title = $page->title;
        $slug = $page->slug;

        return view('arc::page', [
            'html' => $html,
            'css' => $css,
            'title' => $title,
            'slug' => $slug
        ]);
    }
}
