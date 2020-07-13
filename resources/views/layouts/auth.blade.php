<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/assets-auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/assets-auth/css/style.css">
</head>
<body>
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                @yield('content')
            </div>
        </section>

    </div>
 <!-- JS -->
    <script src="/assets-auth/vendor/jquery/jquery.min.js"></script>
    <script src="/assets-auth/js/main.js"></script>
    @yield('extra-js')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>