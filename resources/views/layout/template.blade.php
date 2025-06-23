<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/admiro/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 May 2025 11:42:19 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <title>{{ $title }}</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admiro') }}/assets/images/title1.png" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('admiro') }}/assets/images/title1.png" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet" />
    @include('components.styles')
</head>

<body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <header class="page-header row">
            <div class="logo-wrapper d-flex align-items-center col-auto"><a href="index.html"><img
                        class="light-logo img-fluid" src="{{ asset('admiro') }}/assets/images/logo/logo1.png"
                        alt="logo" /><img class="dark-logo img-fluid"
                        src="{{ asset('admiro') }}/assets/images/logo/logo-dark.png" alt="logo" /></a><a
                    class="close-btn toggle-sidebar" href="javascript:void(0)">
                    <svg class="svg-color">
                        <use href="{{ asset('admiro') }}/assets/svg/iconly-sprite.svg#Category"></use>
                    </svg></a></div>
            <div class="page-main-header col">
                <div class="header-left">
                    <form class="form-inline search-full col" action="#" method="get">
                        <div class="form-group w-100">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="demo-input Typeahead-input form-control-plaintext w-100"
                                        type="text" placeholder="Search Admiro .." name="q" title=""
                                        autofocus="autofocus" />
                                    <div class="spinner-border Typeahead-spinner" role="status"><span
                                            class="sr-only">Loading...</span></div><i class="close-search"
                                        data-feather="x"></i>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group-header d-lg-block d-none">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative d-flex align-items-center">
                                <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100"
                                    type="text" placeholder="Type to Search..." name="q" title="" /><i
                                    class="search-bg iconly-Search icli"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-right">
                    <ul class="header-right">
                        <li class="custom-dropdown">
                            <div class="translate_wrapper">
                                <div class="current_lang"><a class="lang" href="javascript:void(0)"><i
                                            class="flag-icon flag-icon-us"></i>
                                        <h6 class="lang-txt f-w-700">ENG</h6>
                                    </a></div>
                                <ul class="custom-menu profile-menu language-menu py-0 more_lang">
                                    <li class="d-block"><a class="lang" href="#" data-value="English"><i
                                                class="flag-icon flag-icon-us"></i>
                                            <div class="lang-txt">English</div>
                                        </a></li>
                                    <li class="d-block"><a class="lang" href="#" data-value="fr"><i
                                                class="flag-icon flag-icon-fr"></i>
                                            <div class="lang-txt">Français</div>
                                        </a></li>
                                    <li class="d-block"><a class="lang" href="#" data-value="es"><i
                                                class="flag-icon flag-icon-es"></i>
                                            <div class="lang-txt">Español</div>
                                        </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="search d-lg-none d-flex"> <a href="javascript:void(0)">
                                <svg>
                                    <use href="{{ asset('admiro') }}/assets/svg/iconly-sprite.svg#Search">
                                    </use>
                                </svg></a></li>
                        <li><a class="full-screen" href="javascript:void(0)">
                                <svg>
                                    <use href="{{ asset('admiro') }}/assets/svg/iconly-sprite.svg#scanfull">
                                    </use>
                                </svg></a></li>
                        <li class="profile-nav custom-dropdown">
                            <div class="user-wrap">
                                <div class="user-img"><img src="{{ asset('admiro') }}/assets/images/profil1.jpg"
                                        alt="user" /></div>
                                <div class="user-content">
                                    <h6>{{ auth()->user()->name }}</h6>
                                    <p class="mb-0">Admin<i class="fa-solid fa-chevron-down"></i></p>
                                </div>
                            </div>
                            <div class="custom-menu overflow-hidden">
                                <ul class="profile-body">
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ asset('admiro') }}/assets/svg/iconly-sprite.svg#Login">
                                            </use>
                                        </svg><a class="ms-2" href="/logout">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page sidebar start-->
            @include('components.sidebar')
            <!-- Page sidebar end-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <h2>{{ $title }}</h2>
                                <p class="mb-0 text-title-gray">Welcome back! Let’s start from where you left.</p>
                            </div>
                            <div class="col-sm-6 col-12">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid default-dashboard">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2024 © Admiro theme by pixelstrap.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="float-end mb-0">Hand crafted &amp; made with
                                <svg class="svg-color footer-icon">
                                    <use href="{{ asset('admiro') }}/assets/svg/iconly-sprite.svg#heart">
                                    </use>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('components.scripts')
</body>

<!-- Mirrored from admin.pixelstrap.net/admiro/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 May 2025 11:43:48 GMT -->

</html>
