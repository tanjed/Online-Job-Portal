<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{route('applicant.dashboard.show')}}">
        Online Job Portal
    </a>

    <!-- Links -->
    <ul class="navbar-nav" style="width: 100%;">
        @auth
            <li class="nav-item" style="margin-left: 80%">
                <a class="nav-link text-light" href="{{route('applicant.edit',auth('applicant')->user()->id)}}">{{auth('applicant')->user()->first_name}}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="{{URL::to(route('applicant.logout'))}}" >Logout</a>
            </li>
        @endauth
    </ul>
</nav>
