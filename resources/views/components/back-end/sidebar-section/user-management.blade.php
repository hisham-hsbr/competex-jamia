 <!-- Users Management Start -->
 @canany(['User Read', 'Role Read', 'Permission Read', 'Activity Logs Read'])
     <x-back-end.layouts.sidebar-nav-level head="Users Management" href="#"
         menu_open="{{ request()->is('admin/users-management*') ? 'menu-open' : '' }}"
         active="{{ request()->is('admin/users-management/*') ? 'active' : '' }}" menu_icon="fa fa-folder-open"
         drop_icon="fas fa-angle-left">
         <!-- User Menu Start -->
         @can('User Read')
             <x-back-end.layouts.sidebar-nav-multi-level head="Users" href="{{ route('users.index') }}" menu_open=""
                 active="{{ request()->is('admin/users-management/users*') ? 'active' : '' }}" menu_icon="fa fa-users"
                 drop_icon="" />
         @endcan <!-- User Menu End -->
         <!-- Role Menu -->
         @can('Role Read')
             <x-back-end.layouts.sidebar-nav-multi-level head="Roles" href="{{ route('roles.index') }}" menu_open=""
                 active="{{ request()->is('admin/users-management/roles*') ? 'active' : '' }}" menu_icon="fa fa-user-secret"
                 drop_icon="" />
         @endcan <!-- Role Menu End -->
         <!-- Permission Menu -->
         @can('Permission Read')
             <x-back-end.layouts.sidebar-nav-multi-level head="Permission" href="{{ route('permissions.index') }}"
                 menu_open="" active="{{ request()->is('admin/users-management/permissions*') ? 'active' : '' }}"
                 menu_icon="fa fa-lock" drop_icon="" />
         @endcan <!-- Permission Menu End -->
         <!-- Menu Activity Logs -->
         @can('Activity Logs Read')
             <x-back-end.layouts.sidebar-nav-multi-level head="Activity Logs" href="{{ route('activity-logs.index') }}"
                 menu_open="" active="{{ request()->is('admin/users-management/activity-logs*') ? 'active' : '' }}"
                 menu_icon="fa fa-history" drop_icon="" />
         @endcan <!-- Activity Logs Menu End -->
     </x-back-end.layouts.sidebar-nav-level>
 @endcanany <!-- Users Management end -->
