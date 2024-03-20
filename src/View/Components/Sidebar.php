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
            'General' => [
                'children' => [
                    'Dashboard' => [
                        'icon' => 'mdi mdi-view-dashboard',
                        'route' => 'admin.dashboard',
                    ],
                ]

            ],
            'Pages' => [
                'children' => [
                    'All' => [
                        'icon' => 'mdi mdi-file-multiple',
                        'route' => 'admin.pages.index',
                    ],
                    'New' => [
                        'icon' => 'mdi mdi-plus',
                        'route' => 'admin.pages.create',
                    ],
                ]
            ]
        ];
        return view('admin::components.sidebar', [
            'items' => $items,
        ]);
    }
}
