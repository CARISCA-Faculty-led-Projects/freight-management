<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Open
Product Version: 1.0.2
Purchase: https://keenthemes.com/products/open-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/open-html-pro/authentication/sign-up/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 06:54:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>{{ env('APP_NAME') }} :: Login
    </title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Open admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords"
        content="Open theme, bootstrap, bootstrap 5, admin themes, laravel, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Open HTML Pro- Bootstrap 5 HTML & Laravel Multipurpose Admin Dashboard Theme - Open HTML Pro by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/products/open-html-pro" />
    <meta property="og:site_name" content="Open HTML Pro by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/open-html-pro" />
    <link rel="shortcut icon" href="../../assets/media/logos/favicon.ico" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="../../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Google tag-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    <!--end::Google tag-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto bg-dark w-xl-600px positon-xl-relative">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Header-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="../../index-2.html" class="py-2 py-lg-20">
                            <img alt="Logo" src="../../assets/media/icons/truck.png"
                                class="theme-light-show h-150px h-lg-150px" />
                            <img alt="Logo" src="../../assets/media/icons/truck.png"
                                class="theme-dark-show h-150px h-lg-150px" />
                        </a>
                        <!--end::Logo-->

                        <!--begin::Title-->
                        <h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">
                            Welcome to {{ env("APP_NAME") }}  </h1>
                        <!--end::Title-->

                        <!--begin::Description-->
                        <p class="d-none d-lg-block fw-semibold fs-2 text-white">
                            @yield('page')
                        </p>
                        <!--end::Description-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Illustration-->
                    <div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(../../assets/media/illustrations/dozzy-1/17.png)">
                    </div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Aside-->

            @yield('content')
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
     <!--begin::Footer-->
     {{-- <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        <!--begin::Links-->
        <div class="d-flex flex-center fw-semibold fs-6">
            <a href="#" class="text-muted text-hover-primary px-2"
                target="_blank">About</a>

            <a href="#" class="text-muted text-hover-primary px-2"
                target="_blank">Support</a>

            <a href="#"
                class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
        </div>
        <!--end::Links-->
    </div> --}}
    <!--end::Footer-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "../../assets/index.html";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="../../assets/plugins/global/plugins.bundle.js"></script>
    <script src="../../assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="../../assets/js/custom/authentication/sign-up/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/open-html-pro/authentication/sign-up/basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 06:54:45 GMT -->

</html>
