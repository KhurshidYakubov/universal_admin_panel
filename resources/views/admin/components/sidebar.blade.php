<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <img src="{{ asset('images/admin/logo_uzinfocom.svg') }}" alt="" style="width: 200px;">
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <div class="sidebar_title">
            <span>{{ __('main.menu') }}</span>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('menus.index') }}">
            <i class="fas fa-ellipsis-h"></i>
            <span>{{ __('main.menu') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="far fa-newspaper"></i>
            <span>{{ __('main.news') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('statistics.index') }}">
            <i class="fas fa-chart-bar"></i>
            <span>{{ __('main.statistics') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('links.index') }}">
            <i class="fas fa-link"></i>
            <span>{{ __('main.links') }}</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('managements.index') }}">
            <i class="fas fa-user-friends"></i>
            <span>{{ __('main.team') }}</span></a>
    </li>

    @can('superadmin', auth()->user())
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>SuperAdmin</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>{{ __('main.users') }}</span></a>

                    <a class="collapse-item" href="{{ route('list_types.index') }}">
                        <i class="fas fa-th-large"></i>
                        <span>{{ __('main.types') }}</span></a>

                    <a class="collapse-item" href="{{ route('list_categories.index') }}">
                        <i class="fas fa-th"></i>
                        <span>{{ __('main.categories') }}</span></a>

                    <a class="collapse-item" href="{{ route('lists.index') }}">
                        <i class="fas fa-stream"></i>
                        <span>{{ __('main.lists') }}</span></a>

                    <a class="collapse-item" href="{{ route('menu_categories.index') }}">
                        <i class="fas fa-ellipsis-h"></i>
                        <span>{{ __('main.menu_categories') }}</span></a>

                    <a class="collapse-item" href="{{ route('management_categories.index') }}">
                        <i class="fas fa-ellipsis-h"></i>
                        <span>{{ __('main.management_categories') }}</span></a>
                </div>
            </div>
        </li>
    @endcan
</ul>
<!-- End of Sidebar -->
