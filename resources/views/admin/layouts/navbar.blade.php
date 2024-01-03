<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="{{route('admin')}}" class="navbar-brand"><img src="{{asset('dashboard/assets/images/brand/icon.svg')}}" alt="BigBucket" /> <strong>Big</strong> Bucket</a>
        <div id="navbar_main">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="javascript:void(0);" id="navbar_1_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-left">

                        <div class="dropdown-divider" role="presentation"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item" :href="route('logout')"
                               onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fa fa-sign-out text-primary"></i>تسجيل الخروج</a>

                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
