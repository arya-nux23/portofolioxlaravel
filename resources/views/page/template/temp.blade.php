<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpriverthemes.com/landing/gridx-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 04:24:27 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- logo icon title -->
    <link rel="icon" href="{{ asset('pages') }}/assets/images/title1.png" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/gh/iconoir-icons/iconoir%40main/css/iconoir.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/aos.css">
    <link rel="stylesheet" href="{{ asset('pages') }}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/iconoir/css/iconoir.css">
    <style>
        .skill-item {
            color: white;
        }

        .percent {
            display: block;
            font-size: 14px;
            color: #aaa;
        }

        .name {
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <main class="main-homepage">
        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">
                    <a href="/profile" class="logo">
                        <img src="{{ asset('pages') }}/assets/images/aray1.png" alt="Logo" width="90"
                            height="70">
                    </a>

                    <nav class="navbar">
                        <ul class="menu">
                            <li class="active"><a href="/profile">Profile</a></li>
                            <li><a href="/tentang/saya">About</a></li>
                            <li><a href="/pekerjaan">Works</a></li>
                        </ul>
                        <a href="/contact" class="theme-btn">Hubungi</a>
                    </nav>
                    <a href="/contact" class="theme-btn">Hubungi</a>
                    <div class="show-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer class="footer-area">
                <div class="footer-content text-center">
                    <p class="copyright">
                        &copy; By: Arya <span>linx23</span>
                    </p>
                </div>
        </footer>
    </main>
    <script src="{{ asset('pages') }}/assets/js/jquery-3.6.4.js"></script>
    <script src="{{ asset('pages') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('pages') }}/assets/js/aos.js"></script>
    <script src="{{ asset('pages') }}/assets/js/main.js"></script>
</body>
<!-- Mirrored from wpriverthemes.com/landing/gridx-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 04:25:40 GMT -->

</html>
