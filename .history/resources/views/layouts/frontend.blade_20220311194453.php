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

    <link rel="icon" href="img/logo2.png" sizes="16x16 32x32 48x48 64x64">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">

    @yield('styles')


</head>


<body>



    <!-- ***** top-page Start ***** -->

    <header class="top-page ">

        <div class="top-banner small">

            <div class="container banner-content">

                <a class="d-block" href="#">

                    <img class="img-fluid banner-logo" src="/img/logo1.svg"
                        alt="الموسوعة الاسلامية - Islamic Encyclopedia">

                </a>


            </div>
        </div>


    </header>

    <!-- ***** top-page End ***** -->





    <!-- ***** page-wrapper Start ***** -->

    <div class="page-wrapper">


        <!-- ***** breadcrumb Start ***** -->

        <div class="section-style breadcrumb-container">

            <div class="container">

                <nav class="breadcrumb-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        @yield('breadcrumb')


                    </ol>
                </nav>


            </div>

        </div>

        <!-- ***** breadcrumb End ***** -->
        <!-- ***** main-menu-section End ***** -->

        @yield('content')



    </div>

    <!-- ***** page-wrapper End ***** -->


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

    <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- main style js   -->
    <script src="/js/main-frontend.js"></script>


	<script src="/ckeditor/ckeditor.js"></script>

    {{-- <!-- ***** to resolve uploading csv files in frontend ***** -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
    @yield('scripts')


</body>

</html>
