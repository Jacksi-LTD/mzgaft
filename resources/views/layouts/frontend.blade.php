<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="height=device-height,
                      width=device-width, initial-scale=1.0,
                      minimum-scale=1.0, maximum-scale=1.0,
                      user-scalable=no">

    <meta name="theme-color" content="#8BC34A">

    <title>@yield('page_title') - {{ trans('panel.site_title') }}</title>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="/css/fonts/stylesheet.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">

    <link rel="icon" href="/img/logo2.png" sizes="16x16 32x32 48x48 64x64">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <link rel="stylesheet" type="text/css" href="/css/custom.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">


    @yield('styles')


</head>

<body>



    <!-- ***** top-page Start ***** -->

    <header class="top-page ">

        <div class="top-banner small">

            <div class="container banner-content">

                <a class="d-block" href="index.html">

                    <img class="img-fluid banner-logo" src="/img/logo1.svg"
                        alt="الموسوعة الاسلامية - Islamic Encyclopedia">

                </a>


            </div>
        </div>


    </header>

    <!-- ***** top-page End ***** -->



    <!-- ***** page-wrapper Start ***** -->

    <div class="page-wrapper">


        <!-- ***** main-menu-section Start ***** -->

        <section class="section-style main-menu-section ">

            <div class="container">

                <div class="main-menu-container small-menu">

                    <x-main-menu/>

                </div>

            </div>

        </section>

        <!-- ***** main-menu-section End ***** -->



        <!-- ***** breadcrumb Start ***** -->

        <div class="section-style breadcrumb-container">

            <div class="container">

                <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        @yield('breadcrumb')
                        <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>

                    </ol>
                </nav>


            </div>

        </div>



        <!-- ***** breadcrumb End ***** -->



        @yield('content')





        <!-- ***** footer Start ***** -->

        <footer>

            <div class="container">

                <div class="footer-content">

                    <a class="d-block" href="#">
                        <img class="img-fluid footer-img" src="/img/logo2.png"
                            alt="الموسوعة الاسلامية - Islamic Encyclopedia">
                    </a>

                    <p class="footer-about">

                        هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                        الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
                    </p>

                    <div class="fixed-social-list">

                        <a class="list-item" href="#"><i class="fa-brands fa-youtube"></i></a>
                        <a class="list-item" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a class="list-item" href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a class="list-item" href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a class="list-item" href="#"><i class="fa-brands fa-facebook-f"></i></a>

                    </div>


                </div>

            </div>

        </footer>

        <!-- ***** footer End ***** -->


    </div>

    <!-- ***** page-wrapper End ***** -->



    <!-- ***** scrollup Start ***** -->

    <div class="scrollup" id="scrollUp">

        <i class="fas fa-level-up-alt"></i>

    </div>

    <!-- ***** scrollup End ***** -->



    <!-- jquery 3.5.1   -->
    <script src="/js/jquery-3.5.1.min.js"></script>

    <!-- bootstrap v5.2  -->
    <script src="/js/bootstrap.bundle.min.js"></script>

    <!-- matchHeight jquery plugin   -->
    <script src="/js/jquery.matchHeight-min.js"></script>

    <!-- main style js   -->
    <script src="/js/main.js"></script>
    @yield('scripts')


</body>

</html>
