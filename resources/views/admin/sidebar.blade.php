<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="/admin/assets/img/logo.png" class="header-logo" /> <span
                    class="logo-name">Project Name</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('group.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Groups</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('student.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Students</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('lesson.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Lessons</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('monitoring.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Monitoring</span></a>
            </li>
            <li class="dropdown ">
                <a href="{{ route('admin.generator') }}" class="nav-link"><i data-feather="monitor"></i><span>Generator</span></a>
            </li>
        </ul>
    </aside>
</div>
