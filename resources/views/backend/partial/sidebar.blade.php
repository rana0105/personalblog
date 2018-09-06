<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-tasks"></i>
        <span>Admin Activities</span>
        </a>
        <div class="dropdown-menu bgstyle" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
        <a class="dropdown-item" href="{{ route('roles.index') }}">Role</a>
        <a class="dropdown-item" href="{{ route('permissions.index') }}">Permission</a>
        <a class="dropdown-item" href="{{ route('posts.index') }}">Post</a>
        {{--  <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a>  --}}
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
</ul>