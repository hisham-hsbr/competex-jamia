@canany(['Admin Settings', 'User Settings', 'User Read', 'Blood Read', 'Permission Read'])
    <x-back-end.layouts.sidebar-nav-header head="Competex" />


    <!-- settings Menu Start -->
    @canany(['Admin Settings', 'Blood Bank Settings'])
        <x-back-end.layouts.sidebar-nav-level head="Competex" href="#"
            menu_open="{{ request()->is('competex*') ? 'menu-open' : '' }}"
            active="{{ request()->is('competex/*') ? 'active' : '' }}" menu_icon="fa-solid fa-school"
            drop_icon="fas fa-angle-left">
            <!-- Courses Start -->
            @can('Courses')
                <x-back-end.layouts.sidebar-nav-multi-level head="Courses" href="{{ route('courses.index') }}" menu_open=""
                    active="{{ request()->is('competex/course*') ? 'active' : '' }}" menu_icon="fa solid fa-user-graduate"
                    drop_icon="" />
            @endcan <!-- Courses End -->
            <!-- Courses Register Start -->
            @can('Courses Register')
                <x-back-end.layouts.sidebar-nav-multi-level head="Courses Register" href="{{ route('course-registrations.index') }}"
                    menu_open="" active="{{ request()->is('competex/course-registration*') ? 'active' : '' }}"
                    menu_icon="fa-solid fa-id-card" drop_icon="" />
            @endcan <!-- Courses Register End -->
        </x-back-end.layouts.sidebar-nav-level>
    @endcanany <!-- settings Menu End -->



@endcanany <!-- Admin Aection Menu -->
