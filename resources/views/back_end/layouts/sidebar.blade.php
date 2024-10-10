<!-- Brand Logo -->
<a href="/" class="brand-link">
    <!-- sidebar_mini_logo -->
    @if ($settings['logo_sidebar_mini'] == 1)
        {{-- <x-app.application-logo-mini width="27" /> --}}
    @endif
    <div style="padding-left: 20px">

    </div>
    <!-- sidebar_logo -->
    @if ($settings['logo_sidebar'] == 1)
        <x-app.application-logo-dark width="135" />
    @endif
    <!-- <span class="brand-text font-weight-light"> {{ $settings['app_name'] }}</span> -->
</a>
<div style="padding:12px">

</div>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
            <x-app.user-profile-image />
        </div>
        <div class="info">
            <a href="/admin/dashboard" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    @can('Sidebar Search Menu')
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
    @endcan <!-- Sidebar Search Menu -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-compact nav-child-indent flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
            <!-- Dashboard Menu Start -->
            @can('Dashboard Menu')
                <x-back-end.layouts.sidebar-nav-level head="Dashboard" href="{{ route('back-end.dashboard') }}"
                    menu_open="" active="{{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    menu_icon="fas fa-tachometer-alt" drop_icon="" />
            @endcan <!-- Dashboard Menu End -->
            <!-- profile Menu Start -->
            @can('User Profile Read')
                <x-back-end.layouts.sidebar-nav-level head="Profile" href="{{ route('profile.edit') }}" menu_open=""
                    active="{{ request()->is('admin/profile') ? 'active' : '' }}" menu_icon="fa fa-user" drop_icon="" />
            @endcan <!-- profile Menu End -->

            {{-- <x-back-end.sidebar-section.developer /> --}}
            <x-back-end.sidebar-section.admin />
            <x-back-end.sidebar-section.user-management />
            <x-back-end.sidebar-section.competex />



        </ul>
    </nav>
    <!-- sidebar-menu -->
</div>
<!-- /.sidebar -->
<div class="sidebar-custom">
    <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
    <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
</div>
<!-- /.sidebar-custom -->
