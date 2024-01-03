
<div class="left_sidebar">
    <nav class="sidebar">
        <div class="user-info">
            <div class="image"><a href="javascript:void(0);"><img src="{{asset('dashboard/assets/images/1 splash.png')}}" alt="User"></a></div>
            <div class="detail mt-3">
                <h5 class="mb-0">لوحه تحكم</h5>
                <br>
            </div>

        </div>
        <br>
        <ul id="main-menu" class="metismenu">

            <li class="{{request()->routeIs('admin') ? ' active' : null}}"><a href="{{route('admin')}}"><i class="ti-home"></i><span>الصفحه الرئسيه</span></a></li>

            <li class="{{request()->routeIs('setting') ? ' active' : null}}"><a href="{{route('setting')}}"><i class="ti-settings"></i><span>الاعدادات الرئسيه</span></a></li>
{{--            <li class="{{request()->routeIs('category.*') ? ' active' : null}}"><a href="{{route('category.index')}}"><i class="ti-notepad"></i><span>الفئات</span></a></li>--}}
{{--            <li class="{{request()->routeIs('sections.*') ? ' active' : null}}"><a href="{{route('sections.index')}}"><i class="ti-server"></i><span>الاقسام</span></a></li>--}}
{{--            <li class="{{request()->routeIs('features.*') ? ' active' : null}}"><a href="{{route('features.index')}}"><i class="ti-flag-alt"></i><span>المميزات</span></a></li>--}}

{{--            <li>--}}
{{--                <a href="javascript:void(0)" class="has-arrow"><i class="ti-pie-chart"></i><span>الاعلانات</span></a>--}}
{{--                <ul>--}}
{{--                    <li class="{{request()->routeIs('ads.*') ? ' active' : null}}"><a href="{{route('ads.index')}}">جميع الاعلانات</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="javascript:void(0)" class="has-arrow"><i class="ti-anchor"></i><span>الباقات</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="{{route('subscriptions.index')}}">جميع الباقات </a></li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="javascript:void(0)" class="has-arrow"><i class="ti-layout-accordion-separated"></i><span>الخدمات</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="{{route('services.index')}}">جميع الخدمات الرئسيه</a></li>--}}
{{--                    <li><a href="{{route('subServices.index')}}">جميع الخدمات الفرعيه</a></li>--}}


{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="{{request()->routeIs('documentations.*') ? ' active' : null}}"><a href="{{route('documentations.index')}}"><i class="ti-comments"></i><span>طلبات التوثيق</span></a></li>--}}


            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-reddit"></i><span>الطلبات</span></a>
                <ul>
                    <li><a href="table-basic.html">طلبات الخدمات</a></li>
                    <li><a href="table-normal.html">طلبات عروض الاسعار</a></li>
                    <li><a href="table-normal.html">طلبات الاشتراكات</a></li>

                </ul>
            </li>

{{--            <li>--}}
{{--                <a href="javascript:void(0)" class="has-arrow"><i class="ti-user"></i><span>الاعضاء</span></a>--}}
{{--                <ul>--}}
{{--                    <li><a href="{{route('users_type','service_provider')}}">جميع اعضاء مقدمي الخدمه</a></li>--}}
{{--                    <li><a href="{{route('users_type','service_applicant')}}">جميع اعضاء طالبي الخدمه</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li>
                <a href="javascript:void(0)" class="has-arrow"><i class="ti-bell"></i><span>الاشعارات</span></a>
                <ul>
                    <li><a href="form-elements.html">ارسال الاشعار</a></li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
