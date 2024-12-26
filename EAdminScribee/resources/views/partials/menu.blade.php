<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <!-- Sidebar Profile Section -->
    <div class="profile_section d-md-down-none">
        <img src="{{ Auth::user()->profile_picture ? asset('storage/profile_pictures/' . Auth::user()->profile_picture) : asset('images/profile.png') }}" alt="Profile Picture" class="profile_image">
        <h4 class="user_name">{{ Auth::user()->name }}</h4>
        {{-- <p class="user-email">{{ Auth::user()->email }}</p> --}}
    </div>

    <!-- Sidebar Menu Items -->
    <ul class="c-sidebar-nav">
        @can('user_management_access')
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" aria-expanded="false">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
            </li>

            @can('permission_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon"></i>
                        {{ trans('cruds.permission.title') }}
                    </a>
                </li>
            @endcan

            @can('role_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon"></i>
                        {{ trans('cruds.role.title') }}
                    </a>
                </li>
            @endcan

            @can('user_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.users.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                        {{ trans('cruds.user.title') }}
                    </a>
                </li>
            @endcan
        @endcan

        @can('status_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.statuses.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/statuses') || request()->is('admin/statuses/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-check c-sidebar-nav-icon"></i>
                    {{ trans('cruds.status.title') }}
                </a>
            </li>
        @endcan

        @can('leave_application_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.leave-applications.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/leave-applications') || request()->is('admin/leave-applications/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon"></i>
                    {{ trans('cruds.leaveApplication.title') }}
                </a>
            </li>
        @endcan

        @can('remuneration_form_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.remuneration-forms.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/remuneration-forms') || request()->is('admin/remuneration-forms/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon"></i>
                    {{ trans('cruds.remunerationForm.title') }}
                </a>
            </li>
        @endcan

        @can('comment_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.comments.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/comments') || request()->is('admin/comments/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-comment c-sidebar-nav-icon"></i>
                    {{ trans('cruds.comment.title') }}
                </a>
            </li>
        @endcan

        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon"></i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif

        <!-- Additional Sidebar Items -->
        <li class="c-sidebar-nav-item">
            <a href="{{ url('/home') }}" class="c-sidebar-nav-link">
                <i class="fas fa-home c-sidebar-nav-icon"></i>
                Home
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-chart-bar c-sidebar-nav-icon"></i>
                Overview
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-inbox c-sidebar-nav-icon"></i>
                Inbox
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-paper-plane c-sidebar-nav-icon"></i>
                Outbox
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-file c-sidebar-nav-icon"></i>
                Draft
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-cloud-upload-alt c-sidebar-nav-icon"></i>
                Upload new
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-cogs c-sidebar-nav-icon"></i>
                Setting
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-shield-alt c-sidebar-nav-icon"></i>
                Privacy
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-medal c-sidebar-nav-icon"></i>
                Award
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fas fa-layer-group c-sidebar-nav-icon"></i>
                Features
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt c-sidebar-nav-icon"></i>
                Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">

            </a>
        </li>
    </ul>
</div>

