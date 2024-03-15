<?php

namespace Onjoakimsmind\Arc\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Onjoakimsmind\Arc\Models\Page;

class PageController extends Controller
{
    public function show(string $slug = 'home')
    {
        $page = Page::where('slug', $slug)->first();
        return view('admin::page', ['page' => $page]);
    }

    public function getHTML(string $slug = 'home')
    {
        $page = Page::where('slug', $slug)->first();
        $html = view('arc::partials.header', ['page' => $page])->render();
        $html .= objToHTML(json_decode($page->content, true));
        $html .= view('arc::partials.footer', ['page' => $page])->render();
        return response()->json(['html' => $html]);
    }

    public function getCSS(string $slug = 'home')
    {
        $page = Page::where('slug', $slug)->first();
        return response($page->style, 200)->header('Content-Type', 'text/css');
    }

    public function htmlParser(string $slug = 'home')
    {
        $page = Page::where('slug', $slug)->first();
        $content = objToHTML(json_decode($page->content, true));

        return response()->json(['html' => $content]);
    }

    public function update(Request $request, string $slug)
    {
        $page = Page::where('slug', $slug)->first();
        $html = $request->input('html');
        $parsed = htmlToObj($html);
        $page->content = $parsed;
        $page->style = $request->input('css');

        $page->save();
        return response()->json(['msg' => 'Ok', 'page' => $page]);
    }

    /* public function store(Request $request)
    {
        $page = new Page();
        $html = $request->input('html');
        $parsed = preg_replace('/<(html|body)[^<]+?>|<\/(html|body)>/', '', $html);

        $page->title = "Test";
        $page->slug = "test";
        $page->content = $parsed;
        $page->style = $request->input('css');

        $page->save();
        return response()->json(['msg' => 'Ok', 'page' => $page]);
    } */

    /* public function htmlToObj($html)
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($html);
        return $this->elementToObj($dom->documentElement);
    }

    public function elementToObj($element)
    {
        $obj = array( "tag" => $element->tagName );
        foreach ($element->attributes as $attribute) {
            $obj[$attribute->name] = $attribute->value;
        }
        foreach ($element->childNodes as $subElement) {
            if ($subElement->nodeType == XML_TEXT_NODE) {
                $obj["html"] = $subElement->wholeText;
            } else {
                $obj["children"][] = $this->elementToObj($subElement);
            }
        }
        return $obj;
    }

    public function objToHTML($obj)
    {
        $dom = new \DOMDocument();
        $dom->appendChild($this->objToElement($dom, $obj));
        return $dom->saveHTML();
    }

    public function objToElement($dom, $obj)
    {
        $element = $dom->createElement($obj["tag"]);
        foreach ($obj as $key => $value) {
            if ($key == "tag" || $key == "html" || $key == "children") {
                continue;
            }
            $element->setAttribute($key, $value);
        }
        if (isset($obj["html"])) {
            $element->appendChild($dom->createTextNode($obj["html"]));
        }
        if (isset($obj["children"])) {
            foreach ($obj["children"] as $child) {
                $element->appendChild($this->objToElement($dom, $child));
            }
        }
        return $element;
    } */
}