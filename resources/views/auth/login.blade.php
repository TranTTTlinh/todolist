<!DOCTYPE html>
<html lang="en">

<head>
    <title>Todolist | linhttt</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <!-- ok không ok  -->
    <!-- <link href="<?php echo asset('auth/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" /> -->
    <link href="{{ URL::to('auth/css/style.css') }}" rel="stylesheet">
    <!-- css files -->

    <!-- Online-fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@0,400;0,500;1,400&display=swap"
        rel="stylesheet">
    <!-- //Online-fonts -->

</head>

<body>
    <!-- main -->
    <div class="main">
        <div class="main-w3l">
            <h1 class="logo-w3"></h1>
            <div class="w3layouts-main">
                <h2><span>ĐĂNG NHẬP</span></h2>
                <div class="social">
                    <form action="{{ URL::to('/signin') }}" method="POST">
						{{ csrf_field() }}
                        <input placeholder="Nhập vào tài khoản của bạn" name="Username" type="text" required="">
                        <input placeholder="Nhập vào mật khẩu của bạn" name="Password" type="password" required="">
                        <input type="submit" value="ĐĂNG NHẬP" name="login">
                    </form>
                    <!-- <h6><a href="#">Lost Your Password?</a></h6> -->
                </div>
                <!-- //main -->
				<p>Chưa có tài khoản | <a href="{{ URL::to('/register') }}">Đăng ký ngay</a></p>
                <!--footer-->
                <div class="footer-w3l">
                    <p>&copy; All rights reserved | Design by <a
                            href="https://www.facebook.com/linh.tran.98.06/">Linlin</a></p>
                </div>
                <!--//footer-->
            </div>
        </div>

</body>

</html>