<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.create')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.create') }}">Добавить новость</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test1')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.test1') }}">download json</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test2')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.test2') }}">download image</a>
</li>
