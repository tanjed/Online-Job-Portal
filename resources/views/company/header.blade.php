<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{route('company.dashboard.show')}}">
        Online Job Portal
    </a>

    <!-- Links -->
    <ul class="navbar-nav" style="width: 100%;">
        @auth
            <li class="nav-item" style="margin-left: 80%">
                <a class="nav-link text-light disabled">{{auth('company')->user()->business_name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{URL::to(route('company.logout'))}}" >Logout</a>
            </li>
        @endauth
    </ul>
</nav>
