@canany(['Admin Settings', 'User Settings', 'User Read', 'Blood Read', 'Permission Read'])
    <x-back-end.layouts.sidebar-nav-header head="Admin Section" />


    <!-- settings Menu Start -->
    @canany(['Admin Settings', 'Blood Bank Settings'])
        <x-back-end.layouts.sidebar-nav-level head="Settings" href="#"
            menu_open="{{ request()->is('admin/settings*') ? 'menu-open' : '' }}"
            active="{{ request()->is('admin/settings/*') ? 'active' : '' }}" menu_icon="fa fa-cogs" drop_icon="fas fa-angle-left">
            <!-- Admin Settings Start -->
            @can('Admin Settings')
                <x-back-end.layouts.sidebar-nav-multi-level head="Admin Settings" href="{{ route('admin-settings.index') }}"
                    menu_open="" active="{{ request()->is('admin/settings/admin-settings*') ? 'active' : '' }}"
                    menu_icon="fa fa-wrench" drop_icon="" />
            @endcan <!-- Admin Settings End -->
        </x-back-end.layouts.sidebar-nav-level>
    @endcanany <!-- settings Menu End -->



@endcanany <!-- Admin Aection Menu -->
