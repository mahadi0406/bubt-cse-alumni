<nav id="sidebar" class="sidebar js-sidebar">
    <a class="sidebar-brand" href="/dashboard">
        <span class="align-middle">BUBT Alumni</span>
    </a>

    <ul class="sidebar-nav">
        <li class="sidebar-header"> Menu </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="/dashboard">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="javascript:void(0)">
                <i class="align-middle" data-feather="users"></i> <span class="  align-middle">Members</span>
            </a>

            <ul>
                <li>
                    <a class="sidebar-link" href="{{ route('members.request') }}">
                        <i class="align-middle" data-feather="phone-incoming"></i> <span class="  align-middle">All Requests</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/jobs">
                <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Jobs</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="/jobs">
                <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Event</span>
            </a>
        </li>

    </ul>
</nav>
