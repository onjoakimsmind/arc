<?php

namespace Onjoakimsmind\Arc\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use Onjoakimsmind\Arc\Models\Page;
use Onjoakimsmind\Arc\Models\PageRevision;

class PageControl extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(public string $id)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $page = Page::find($this->id)->with(['revisions' => function ($query) {
            $query->orderBy('id', 'DESC')->limit(10);
        }])->first();

        return view('admin::components.pagecontrol', [
            'page' => $page,
        ]);
    }
}
