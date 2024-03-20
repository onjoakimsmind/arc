<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            Admin <b class="font-black">One</b>
        </div>
    </div>
    <div class="menu is-menu-main">
        @foreach ($items as $label => $item)
            @if (array_key_exists('children', $item))
                <p class="menu-label">{!! $label !!}</p>
                <ul class="menu-list">
                    @foreach ($item['children'] as $subLabel => $subItem)
                        <li class="">
                            <a href="{{ route($subItem['route']) }}">
                                <span class="icon">
                                    <i class="{!! $subItem['icon'] !!}"></i>
                                </span>
                                <span class="menu-item-label">{!! $subLabel !!}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="index.html">
                    <span class="icon">
                        <i class="{!! $item['icon'] !!}"></i>
                    </span>
                    <span class="menu-item-label">{!! $label !!}</span>
                </a>
            @endif
        @endforeach
    </div>
</aside>
