<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="height=device-height,
                      width=device-width, initial-scale=1.0,
                      minimum-scale=1.0, maximum-scale=1.0,
                      user-scalable=no">

    <meta name="theme-color" content="#323C79">

    <title>{{ trans('panel.site_title') }}</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" type="text/css" href="css/fonts/stylesheet.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">

    <link rel="icon" href="img/logo2.png" sizes="16x16 32x32 48x48 64x64">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" type="text/css" href="/css/main.css">


    @yield('styles')

</head>

<body>



    <!-- ***** top-page Start ***** -->

    <header class="top-page">

        <div class="top-banner">

            <div class="container banner-content">

                <a class="d-block" href="{{ route('frontend.home') }}">

                    <img class="img-fluid banner-logo" src="img/logo1.png"
                        alt="مزگەفت">

                </a>

                <div class="fixed-social-list">

                    <a class="list-item" href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a class="list-item" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a class="list-item" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a class="list-item" href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a class="list-item" href="#"><i class="fa-brands fa-facebook-f"></i></a>

                </div>
            </div>
        </div>



    </header>

    <!-- ***** top-page End ***** -->


    <!-- ***** page-wrapper Start ***** -->

    <div class="page-wrapper">


        <!-- ***** main-menu-section Start ***** -->

        <section class="section-style main-menu-section ">

            <div class="container">

                <x-main-menu />

            </div>

        </section>
        <section class="section-style main-menu-section d-none">

            <div class="container">

                <div class="main-menu-container ">

                    <div class="duplicated-box box-lg">

                        <div class="box-header box-padding">

                            <div class="header-title ">

                                لیستا سەرەکی

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content main-menu-items">

                                <div
                                    class="row row-cols-xxl-8 row-cols-xl-4 row-cols-md-4 row-cols-sm-2 row-cols-2 justify-content-start row-flex  gx-3 max-8">

                                    <div class="item-wrap">

                                        <a class="menu-item active" href="#"><span>سەرەکی</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>تەفسیرا قورئانێ</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"><span>گوتار</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>وانێن دەنگی</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>پەرتۆکێن دەنگی</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>پرسیار و بەرسڤ</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>پەرتۆک</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>عنصر اخر</span></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- ***** main-menu-section End ***** -->
        @yield('content')


        <!-- ***** main-menu-section Start ***** -->

        <section class="section-style article-banner-section">

            <div class="container">

                <div class="article-banner-container ">

                    <div class="duplicated-box box-lg">

                        <div class="box-header box-padding space-between">

                            <div class="header-title ">

                                تەفسیرا قورئانێ

                            </div>
                            <a class="header-more duplicated-more-btn " href="{{ route('frontend.tafsir.index') }}">

                                <span class="title-text">زێدەتر</span>

                            </a>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content article-banner-item">

                                <div class="text-bg">

                                    <p class="line-height-more">

                                        {{ $aya->aya }}

                                    </p>

                                </div>
                                <p class="text-details">

                                    {!! $aya->tafsir !!}

                                </p>
                                <a class="more-details"
                                    href="{{ route('frontend.tafsir.show', $aya->surah_id) . '#' . $aya->number }}">تەمامییا تەفسیرێ</a>

                                <div class="info-wrap">

                                    <div class="info">

                                        <div class="info-text">{{ $aya->surah->name }}</div>
                                        <div class="info-num">{{ $aya->number }}</div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- ***** main-menu-section End ***** -->


        <!-- ***** articles-section Start ***** -->

        <section class="section-style articles-section">

            <div class="container">

                <div class="home-articles ">


                    <div class="row">

                        <div class="col-lg-6 mb-5 mb-lg-0">

                            <div class="duplicated-box box-lg article-style">

                                <div class="box-header box-padding space-between">

                                    <div class="header-title ">

                                        گوتار

                                    </div>
                                    <a class="header-more duplicated-more-btn "
                                        href="{{ route('frontend.blogs.index') }}">

                                        <span class="title-text">زێدەتر</span>

                                    </a>

                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content">

                                        <ul class="body-list articles-list">

                                            @foreach ($blogs as $blog)
                                                <li class="list-item">

                                                    <div class="item-wrap">

                                                        <div class="item-icon">

                                                            <img class="img-fluid" src="/img/main-icon.png">
                                                        </div>
                                                        <div class="item-content">

                                                            <a class="item-link"
                                                                href="{{ route('frontend.blogs.show', $blog->id) }}">{{ $blog->title }}</a>

                                                            @if ($blog->writer)
                                                                <div class="item-info">

                                                                    <span>

                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 14 14">
                                                                            <path
                                                                                d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                                                        </svg>


                                                                    </span>
                                                                    {{ $blog->writer?->name }}
                                                                </div>
                                                            @endauth
                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>


                    </div>
                    <div class="col-lg-6">

                        <div class="duplicated-box box-lg article-style no-info">

                            <div class="box-header box-padding space-between">

                                <div class="header-title ">

                                    پرسیار و بەرسڤ

                                </div>
                                <a class="header-more duplicated-more-btn "
                                    href="{{ route('frontend.questions.index') }}">

                                    <span class="title-text">زێدەتر</span>

                                </a>

                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

                                    <ul class="body-list articles-list">
                                        @foreach ($questions as $question)
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="/img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link"
                                                            href="{{ route('frontend.questions.show', $question->id) }}">{{ $question->title }}</a>

                                                        @if ($question->person)
                                                            <div class="item-info">

                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 14 14">
                                                                        <path
                                                                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                                                    </svg>


                                                                </span>
                                                                {{ $question->person?->name }}
                                                            </div>
                                                        @endauth
                                                </div>

                                            </div>

                                        </li>
                                    @endforeach



                                </ul>

                            </div>

                        </div>

                    </div>


                </div>

            </div>


        </div>

    </div>

</section>

<!-- ***** articles-section End ***** -->


<!-- ***** lectures-section Start ***** -->

<section class="section-style lectures-section">

    <div class="container lectures-items">

        <div class="duplicated-box box-lg parent-box ">

            <div class="box-header box-padding space-between">

                <div class="header-title ">

                    وانە

                </div>
                <a class="header-more duplicated-more-btn " href="{{ route('frontend.audios.index') }}">

                    <span class="title-text">زێدەتر</span>

                </a>

            </div>
            <div class="box-body box-padding">

                <div class="body-content scroll table-responsive ">

                    <div class="items-cols">

                        <div class="row gx-0">

                            <div class="col-12">

                                <div class="lectures-items-banner">
                                    <div class="lectures-items-title ">

                                        <div class="title-item me-1">ماموستا</div>
                                        <div class="title-item">وانە</div>
                                        <div class="title-item">خەلەکە</div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="scroll-content scroll">

                                    <div class="duplicated-box  lessons-style duplicated-box-2 child-box ">

                                        <div class="body-content ">

                                            <ul class="body-list lessons-list" id="nav-sidebar">
                                                @foreach ($people as $i => $person)
                                                    {{-- @dd($person) --}}
                                                    <li class="list-item" id="{{ $person->id }}">

                                                        <div class="item-content {{ $i == 0 ? 'active' : '' }}"
                                                            id="{{ $person->id }}"
                                                            onclick="click_person(this);">


                                                            <div class="item-type item-link">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="17" height="20"
                                                                        viewBox="0 0 17 20">
                                                                        <path id="user"
                                                                            d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                    </svg>

                                                                </span>
                                                                <span
                                                                    class="text">{{ $person->name }}</span>

                                                            </div>

                                                            <div class="item-type sub-content">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="15" height="11.675"
                                                                        viewBox="0 0 15 11.675">
                                                                        <path id="folder-open"
                                                                            d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z"
                                                                            transform="translate(0 -32)" />
                                                                    </svg>


                                                                </span>
                                                                <span
                                                                    class="text">{{ $person->audios_count }}</span>

                                                            </div>

                                                        </div>

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="scroll-content scroll">

                                    <div class="duplicated-box  lessons-style duplicated-box-2 child-box ">

                                        <div class="body-content ">

                                            <ul class="body-list  lessons-list" id="subjects">
                                                @foreach ($first_audios as $audio)
                                                    <li class="list-item" id="{{$audio->id}}">

                                                        <div class="item-content audio"
                                                        id="{{$audio->id}}"
                                                        onclick="click_media(this);">



                                                            <div class="item-type item-link">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="17" height="17"
                                                                        viewBox="0 0 17 17">
                                                                        <path id="indent"
                                                                            d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z"
                                                                            transform="translate(0 -32)" />
                                                                    </svg>

                                                                </span>
                                                                <span
                                                                    class="text">{{ $audio->title }}</span>

                                                            </div>

                                                            <div class="item-type sub-content">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="15" height="10.687"
                                                                        viewBox="0 0 15 10.687">
                                                                        <path id="volume-high"
                                                                            d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z"
                                                                            transform="translate(0 -28.001)" />
                                                                    </svg>


                                                                </span>
                                                                <span
                                                                    class="text">{{ $audio->media_count }}</span>

                                                            </div>

                                                        </div>

                                                    </li>
                                                @endforeach


                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="scroll-content scroll">

                                    <div
                                        class="duplicated-box box-lg  lessons-style duplicated-box-2 child-box  aduio_player ">


                                        <div class="body-content ">

                                            <ul class="body-list  lessons-list" id="audio_files">
                                                {{-- @dd($first_audios) --}}
                                                @if(isset($first_files))
                                                    @foreach ($first_files as $key => $media)
                                                        <li class="list-item">

                                                            <a class="aduio-item item-content" href="#">


                                                                <div class="item-type item-link">

                                                                    <span class="icon">



                                                                    </span>
                                                                    <span class="text">{{ substr($media->name, strpos($media->name, '_') + 1) }}</span>

                                                                </div>

                                                                <div class="item-type sub-content">

                                                                    <span class="icon">

                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="15" height="15"
                                                                            viewBox="0 0 15 15">
                                                                            <path id="clock"
                                                                                d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z" />
                                                                        </svg>


                                                                    </span>
                                                                    <span class="text">{{ $media->getCustomProperty('duration') }}</span>

                                                                </div>

                                                            </a>

                                                        </li>
                                                    @endforeach
												@endif



                                            </ul>

                                        </div>


                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ***** lectures-section End ***** -->



<!-- ***** books-section Start ***** -->

<section class="section-style books-section">

    <div class="container">


        <div class="duplicated-box box-lg">

            <div class="box-header box-padding space-between">

                <div class="header-title ">

                    پەرتۆک

                </div>
                <a class="header-more duplicated-more-btn " href="{{ route('frontend.books.index') }}">

                    <span class="title-text">زێدەتر</span>

                </a>

            </div>
            <div class="box-body box-padding">

                <div class="body-content books-item">

                    <div class="books-container ">

                        <div class="books-slider-container slider-container">


                            <div class="swiper books-slider">

                                <div class="swiper-wrapper">
                                    @foreach ($books as $book)
                                        <div class="swiper-slide">

                                            <div class="book-item">

                                                <div class="book-img">

                                                    <img class="img-fluid" src="{{ $book->image?->getUrl()}}">
                                                </div>
                                                <a class="book-name"
                                                    href="{{ route('frontend.books.show', $book->id) }}">
                                                    {{ $book->title }}</a>
                                                <div class="book-info">
                                                    <span>

                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 14 14">
                                                            <path
                                                                d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z">
                                                            </path>
                                                        </svg>


                                                    </span>

                                                    {{ $book->writer->name }}
                                                </div>


                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>

                            <div class="swiper-pagination"></div>

                        </div>


                    </div>


                </div>

            </div>

        </div>

    </div>

</section>

<!-- ***** books-section End ***** -->



<!-- ***** footer Start ***** -->

<footer>

    <div class="container">

        <div class="footer-content">

            <a class="d-block" href="#">
                <img class="img-fluid footer-img" src="img/logo2.png"
                    alt="سایتێ مزگەفت - Mzgaft Site">
            </a>

            <p class="footer-about">
سایتێ مزگەفت | mzgaft site
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
<script src="js/jquery-3.5.1.min.js"></script>

<!-- bootstrap v5.2  -->
<script src="js/bootstrap.bundle.min.js"></script>

<!-- matchHeight jquery plugin   -->
<script src="js/jquery.matchHeight-min.js"></script>

<!-- swiper js -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- main style js   -->
<script src="js/main.js"></script>

<script>
    /*** swiper books-slider ***/
    var swiper = new Swiper(".books-slider", {
        slidesPerView: 1,
        spaceBetween: 24,
        grabCursor: true,
        scrollbar: {
            el: ".swiper-scrollbar",
            hide: true,
        },
        pagination: {
            el: ".swiper-pagination",

        },

        breakpoints: {

            480: {
                slidesPerView: 2,

            },

            768: {
                slidesPerView: 3,


            },

            992: {
                slidesPerView: 4,

            },

            1400: {
                slidesPerView: 5,

            },
        },

        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },



    });
</script>

<script>
    // $(".nav-sidebar").on('click', 'li', function(e) {
    //     $(this).parent().find('li.active').removeClass('active');
    //     $(this).addClass('active');
    //     console.log($(this));
    // });

    // function click_item() {
    //     console.log($(this));
    //     $(this).parent().parent().find('li.active').removeClass('active');

    //     $(this).addClass('active');

    // }
    // $('#list-item').on('change', function() {
    //     var id = $(this).val();
    //     var officer = $('#officer');
    //     officer.empty();
    //     officer.append('<option value="0">' + " All " + '</option>');

    //     if (id) {
    //         $.ajax({
    //             url: "projects/" + id,
    //             headers: {
    //                 'x-csrf-token': _token
    //             },
    //             method: 'GET',
    //             success: function(data) {
    //                 var officer = $('#project');
    //                 if (data.length > 0) {
    //                     officer.empty();
    //                     officer.append('<option value="0">' + " All " + '</option>');
    //                     $.each(data, function(key, value) {
    //                         officer.append('<option value="' + value.id + '">' + value
    //                             .project_name + '</option>')
    //                     })
    //                 } else {
    //                     officer.empty();
    //                 }
    //             }
    //         })
    //     }
    // });

    function click_person(item) {
        $(".list-item .item-content").each(function(index) {
            $(this).removeClass('active')
        });
        $(item).addClass('active');

        $.ajax({
            url: "audios/person-json/" + item.id,
            headers: {
                'x-csrf-token':  "{{ csrf_token() }}"
            },
            method: 'GET',
            success: function(data) {
                // console.log(data)
                var subjects = $('#subjects');
                // console.log(subjects)
                if (data.length > 0) {
                    subjects.empty();
                    $.each(data, function(key, value) {
                        // console.log(value)
                        subjects.append(
                        '<li class="list-item" id="'+value.id+'"> <div class="item-content audio" id="'+value.id+'" onclick="click_media(this);"> <div class="item-type item-link"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17"> <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" /> </svg> </span> <span class="text">'+value.title+'</span> </div> <div class="item-type sub-content"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687"> <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" /> </svg> </span> <span class="text">'+value.media_count+'</span> </div> </div> </li>'
                        )
                    })
                } else {
                    subjects.empty();
                }
            }
        })
    }

    function click_media(item) {
        $(".list-item .item-content.audio").each(function(index) {
            $(this).removeClass('active')
        });
        $(item).addClass('active');

        $.ajax({
            url: "audios/media-json/" + item.id,
            headers: {
                'x-csrf-token':  "{{ csrf_token() }}"
            },
            method: 'GET',
            success: function(data) {
                var json_data = data;

                var result = [];

                for(var i in json_data)
                    result.push([i, json_data [i]]);

                data = result

                var audio_files = $('#audio_files');
                audio_files.append('<li>ab</li>');
                if (data.length > 0) {
                    audio_files.empty();
                    $.each(data, function(key, value) {
                        // console.log(value)
                        $.each(value, function(key, value) {
                            console.log(value)
                            if(value.name !== undefined)
                            audio_files.append(
                            '<li class="list-item"> <div id="'+value.original_url+'"class="aduio-item item-content play-media" onclick="play_media(this);"> <div class="item-type item-link"> <span class="icon"> </span> <span class="text">'+value.name+'</span> </div> <div class="item-type sub-content"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"> <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z" /> </svg> </span> <span class="text">'+value.duration+'</span> </div> </div> </li>'

                            )
                        }
                    )})
                } else {
                    audio_files.empty();
                }
            }
        })
    }

    var audio = new Audio()
    function play_media(item) {

        audio.pause();
        audio = new Audio(item.id);

        var active = false
        if($(item).hasClass('active')){
            active = true
            $(item).removeClass('active');
            audio.pause();
        }

        audio.onended = function() {
            $(item).removeClass('active');
        };

        $(".list-item .item-content.play-media").each(function(index) {
            $(this).removeClass('active')
        });

        if(!active){
            audio.play();
            $(item).addClass('active');
        }

    }

</script>


</body>

</html>
