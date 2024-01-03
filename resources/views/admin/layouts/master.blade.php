<!doctype html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body class="theme-indigo rtl" style="font-family: 'Cairo', sans-serif;">
@include('admin.layouts.wrapper')
@include('admin.layouts.navbar')
<div class="main_content" id="main-content">
    @include('admin.layouts.left_sidebar')
    <div class="page">
        @yield('navbar')


        <div class="container-fluid">
            @include('admin.messages')
            @yield('content')
        </div>

    </div>

</div>

@include('admin.layouts.footerjs')
</body>
</html>
