<?php

namespace Onjoakimsmind\Arc\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Sidebar extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $items = [
            'Dashboard' => [
                'icon' => 'mdi mdi-view-dashboard',
                'route' => 'admin.dashboard',
            ],
            'Pages' => [
                'icon' => 'mdi mdi-file-multiple',
                'route' => 'admin.pages.index',
            ],
            'Settings' => [
                'icon' => 'mdi mdi-cog',
                'route' => 'admin.settings',
            ]
        ];
        return view('admin::components.sidebar', [
            'items' => $items,
        ]);
    }
}
