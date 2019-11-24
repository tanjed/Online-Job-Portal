<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    @auth('applicant')
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{route('applicant.dashboard.show')}}">
            Online Job Portal
        </a>
    @endauth

    @auth('company')
        <!-- Brand/logo -->
            <a class="navbar-brand" href="{{route('company.dashboard.show')}}">
                Online Job Portal
            </a>
    @endauth

    @guest
        <a class="navbar-brand" href="{{route('applicant.dashboard.show')}}">
            Online Job Portal
        </a>
    @endguest

    <!-- Links -->
    <ul class="navbar-nav" style="width: 100%;">
        @auth('applicant')
            <li class="nav-item" style="margin-left: 80%">
                <a class="nav-link text-light">{{auth('applicant')->user()->first_name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{URL::to(route('applicant.logout'))}}" >Logout</a>
            </li>
        @endauth

        @auth('company')
            <li class="nav-item" style="margin-left: 80%">
                <a class="nav-link text-light">{{auth('company')->user()->first_name}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{URL::to(route('company.logout'))}}" >Logout</a>
            </li>
        @endauth
    </ul>
</nav>
