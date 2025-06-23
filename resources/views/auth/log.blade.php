<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.net/admiro/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 May 2025 11:44:16 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>{{ $title }}</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admiro') }}/assets/images/profil1.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admiro') }}/assets/images/profil1.jpg" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/vendors/flag-icon.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/iconly-icon.css">
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/bulk-style.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/themify.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/fontawesome-min.css">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admiro') }}/assets/css/vendors/weather-icons/weather-icons.min.css">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('admiro') }}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('admiro') }}/assets/css/color-1.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo" href="/profile"><img class="img-fluid for-light m-auto"
                                    src="{{ asset('admiro') }}/assets/images/logo/profil1-log.png"
                                    alt="looginpage"><img class="img-fluid for-dark"
                                    src="{{ asset('admiro') }}/assets/images/logo/profil1-log.png" alt="logo"
                                    style="width: 70px; height: 90px;"></a>
                        </div>
                        <div class="login-main">
                            <form action="/login" method="POST" class="theme-form">
                                @csrf
                                <h2 class="text-center">Sign in to account</h2>
                                <p class="text-center">Enter your email &amp; password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" name="email" type="email" required=""
                                        placeholder="Masukkan email...">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input id="password" class="form-control" type="password" name="password"
                                            required placeholder="*********">
                                        <span onclick="togglePassword()"
                                            style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                                            <i id="eyeIcon" class="fa-solid fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 checkbox-checked">
                                    {{-- <div class="form-check checkbox-solid-info">
                                    </div><a class="link" href="forget-password.html">Forgot password?</a> --}}
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jquery-->
        <script src="{{ asset('admiro') }}/assets/js/vendors/jquery/jquery.min.js"></script>
        <!-- bootstrap js-->
        <script src="{{ asset('admiro') }}/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
        <script src="{{ asset('admiro') }}/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
        <!--fontawesome-->
        <script src="{{ asset('admiro') }}/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
        <!-- password_show-->
        <script src="{{ asset('admiro') }}/assets/js/password.js"></script>
        <!-- custom script -->
        <script src="{{ asset('admiro') }}/assets/js/script.js"></script>
        <!-- Script toggle -->
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById("password");
                const eyeIcon = document.getElementById("eyeIcon");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove("fa-eye");
                    eyeIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove("fa-eye-slash");
                    eyeIcon.classList.add("fa-eye");
                }
            }
        </script>
    </div>
</body>

<!-- Mirrored from admin.pixelstrap.net/admiro/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 May 2025 11:44:16 GMT -->

</html>
