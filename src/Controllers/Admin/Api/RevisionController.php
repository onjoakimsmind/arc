<?php

namespace Onjoakimsmind\Arc\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Onjoakimsmind\Arc\Helpers\Helper;

use Onjoakimsmind\Arc\Models\PageRevision;
use Onjoakimsmind\Arc\Models\Theme;

class RevisionController extends Controller
{
    public function index(string $id)
    {
        $revision = PageRevision::where('page_id', $id)->get();
        return response()->json($revision);
    }

    public function show(string $id)
    {
        $revision = PageRevision::where('page_id', $id)->first();
        return response()->json([
            'pages' => json_decode($revision->html),
            'styles' => json_decode($revision->style)
        ]);
    }

    public function latest(string $id)
    {
        $revision = PageRevision::where('page_id', $id)->orderBy('id', 'DESC')->first();
        return response()->json([
            'pages' => json_decode($revision->html),
            'styles' => json_decode($revision->style)
        ]);
    }

    public function store(Request $request, string $id)
    {
        $revision = new PageRevision();
        $revision->page_id = $id;
        $revision->html = json_encode($request->input('pages'));
        $revision->style = json_encode($request->input('styles'));
        $revision->save();
        return response()->json($revision);
    }
}
