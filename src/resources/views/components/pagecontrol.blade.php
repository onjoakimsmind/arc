<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
            <div class="control"><input placeholder="Search everywhere..." class="input"></div>
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">

            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    <div class="user-avatar">
                    </div>
                    <div class="is-user-name"><span>John Doe</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="profile.html" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Settings</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-logout"></i></span>
                        <span>Log Out</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="flex min-h-16 items-center justify-between border-b border-gray-200 bg-white p-4">
    <div class="flex">
        <label>
            <input class="mx-4 rounded-md border px-4 py-2" type="text" placeholder="Page Title"
                value="{{ $page->title }}">
        </label>
        <label>
            Revision
            <select class="mx-4 rounded-md border px-4 py-2">
                <option value="latest">Latest</option>
                @foreach ($page->revisions as $revision)
                    <option value="{{ $revision->id }}">{{ $revision->created_at }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="flex">
        <button id="publish" class="text-gray-500 focus:text-gray-700 focus:outline-none">
            Publish
        </button>
    </div>
</div>
