<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fontawesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('dashboard/assets/css/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/rtl.css')}}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
</head>

<body class="theme-indigo rtl" style="font-family: 'Cairo', sans-serif;">
<!-- Page Loader -->
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('dashboard/assets/images/brand/icon_black.svg')}}" width="48" height="48" alt="ArrOw"></div>
        <p>جاري تحميل البيانات ...</p>
    </div>
</div>

<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle auth-main">
            <div class="auth-box">
                @include('admin.messages')
                <div class="card">
                    <div class="header">
                        <p class="lead">صفحه تسجيل الدخول</p>
                    </div>
                    <div class="body">

                        <form class="form-auth-small" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control" id="signin-email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control" id="signin-password" name="password" >
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">تسجيل الدخول</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->

<!-- Core -->
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('dashboard/assets/js/theme.js')}}"></script>
</body>
</html>

