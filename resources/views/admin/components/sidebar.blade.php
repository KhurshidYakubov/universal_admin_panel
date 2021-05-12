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
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>{{ __('main.users') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('list_types.index') }}">
            <i class="fas fa-th-large"></i>
            <span>{{ __('main.types') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('list_categories.index') }}">
            <i class="fas fa-th"></i>
            <span>{{ __('main.categories') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{ __('main.locale_test') }}</span></a>
    </li>
</ul>
<!-- End of Sidebar -->
