<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="height=device-height,
                      width=device-width, initial-scale=1.0,
                      minimum-scale=1.0, maximum-scale=1.0,
                      user-scalable=no">

    <meta name="theme-color" content="#8BC34A">

    <title>@yield('page_title') - {{ trans('panel.site_title') }}</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <link rel="stylesheet" type="text/css" href="css/fonts/stylesheet.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">

    <link rel="icon" href="img/logo2.png" sizes="16x16 32x32 48x48 64x64">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" type="text/css" href="css/main.css">


    @yield('styles')

</head>

<body>



    <!-- ***** top-page Start ***** -->

    <header class="top-page">

        <div class="top-banner">

            <div class="container banner-content">

                    <a class="d-block" href="index.html">

                        <img class="img-fluid banner-logo" src="img/logo1.svg" alt="الموسوعة الاسلامية - Islamic Encyclopedia">

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

                <div class="main-menu-container ">

                    <div class="duplicated-box box-lg">

                        <div class="box-header box-padding">

                            <div class="header-title ">

                                القائمة الرئيسية

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content main-menu-items">

                                <div class="row row-cols-xl-7 row-cols-md-4 row-cols-sm-2 row-cols-2 justify-content-start row-flex gx-3 max-7">

                                    <div class="item-wrap">

                                        <a class="menu-item active" href="index.html"><span>الرئيسية</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="quran.html"> <span>تفسير القرآن</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="articles-categories.html"><span>المقالات</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="acoustics-categories.html"> <span>الصوتيات</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>  الكتب الصوتية </span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#">  <span>اسالة واجوبة</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>الكتب</span></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <section class="section-style main-menu-section d-none">

            <div class="container">

                <div class="main-menu-container ">

                    <div class="duplicated-box box-lg">

                        <div class="box-header box-padding">

                            <div class="header-title ">

                                القائمة الرئيسية

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content main-menu-items">

                                <div class="row row-cols-xxl-8 row-cols-xl-4 row-cols-md-4 row-cols-sm-2 row-cols-2 justify-content-start row-flex  gx-3 max-8">

                                    <div class="item-wrap">

                                        <a class="menu-item active" href="#"><span>الرئيسية</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>تفسير القرآن</span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"><span>المقالات</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>الصوتيات</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>  الكتب الصوتية </span></a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#">  <span>اسالة واجوبة</span> </a>

                                    </div>
                                    <div class="item-wrap">

                                        <a class="menu-item" href="#"> <span>الكتب</span></a>

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

                                تفسير القرآن

                            </div>
                            <a class="header-more duplicated-more-btn " href="#">

                                <span class="title-text">المزيد</span>

                            </a>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content article-banner-item">

                                <div class="text-bg">

                                    <p class="line-height-more">

                                        وَإِذَا رَأَيْتَ الَّذِينَ يَخُوضُونَ فِي آيَاتِنَا فَأَعْرِضْ عَنْهُمْ حَتَّىٰ يَخُوضُوا فِي حَدِيثٍ غَيْرِهِ ۚ وَإِمَّا يُنسِيَنَّكَ الشَّيْطَانُ فَلَا تَقْعُدْ بَعْدَ الذِّكْرَىٰ مَعَ الْقَوْمِ الظَّالِمِينَ

                                    </p>

                                </div>
                                <p class="text-details">

                                    قال أبو جعفر: يقول تعالى ذكره لنبيه محمد صلى الله عليه وسلم: وإذا رأيت، يا محمد، المشركين الذين يخوضون في آياتنا التي أنـزلناها إليك, ووحينا الذي أوحيناه إليك, = و " خوضهم فيها "، كان استهزاءَهم بها، وسبَّهم من أنـزلها وتكلم بها، وتكذيبهم بها (60) =" فأعرض عنهم "، يقول: فصد عنهم بوجهك, وقم عنهم، ولا تجلس معهم (61) =" حتى يخوضوا في حديث غيره "، يقول: حتى يأخذوا في حديث غير الاستهزاء بآيات الله من حديثهم بينهم =" وإما ينسينك الشيطان " ، يقوله: وإن أنساك الشيطان نهينا إياك عن الجلوس معهم والإعراض عنهم في حال خوضهم في آياتنا، ثم ذكرت ذلك, فقهم عنهم، ولا تقعد بعد ذكرك ذلك مع القوم الظالمين الذين خاضوا في غير الذي لهم الخوضُ فيه بما خاضوا به فيه. وذلك هو معنى " ظلمهم " في هذا الموضع. (62) , اكمل قراءة التفسير

                                </p>
                                <a class="more-details" href="#">اكمل قراءة التفسير</a>

                                <div class="info-wrap">

                                    <div class="info">

                                        <div class="info-text">سورة الأنعَام</div>
                                        <div class="info-num">68</div>
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

                                        المقالات

                                    </div>
                                     <a class="header-more duplicated-more-btn " href="articles-categories.html">

                                         <span class="title-text">المزيد</span>

                                    </a>

                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content">

                                        <ul class="body-list articles-list">

                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">مَن هُم أهلُ السُّنَّةِ والجَماعَة؟</a>
                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14">
                                                                  <path  d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"/>
                                                                </svg>


                                                            </span>
                                                            أحمد مصطفي
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">مَن هُم أهلُ السُّنَّةِ والجَماعَة؟</a>
                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14">
                                                                  <path  d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"/>
                                                                </svg>


                                                            </span>
                                                            أحمد مصطفي
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">مَن هُم أهلُ السُّنَّةِ والجَماعَة؟</a>
                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14">
                                                                  <path  d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"/>
                                                                </svg>


                                                            </span>
                                                            أحمد مصطفي
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">مَن هُم أهلُ السُّنَّةِ والجَماعَة؟</a>
                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14">
                                                                  <path  d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"/>
                                                                </svg>


                                                            </span>
                                                            أحمد مصطفي
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">مَن هُم أهلُ السُّنَّةِ والجَماعَة؟</a>
                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14">
                                                                  <path  d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"/>
                                                                </svg>


                                                            </span>
                                                            أحمد مصطفي
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="col-lg-6">

                            <div class="duplicated-box box-lg article-style no-info">

                                <div class="box-header box-padding space-between">

                                    <div class="header-title ">

                                        اسالة واجوبة

                                    </div>
                                     <a class="header-more duplicated-more-btn " href="#">

                                         <span class="title-text">المزيد</span>

                                    </a>

                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content ">

                                        <ul class="body-list articles-list">

                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                    </div>

                                                </div>

                                            </li>

                                            <!--<li class="list-item d-none">

                                                <div class="item-wrap">

                                                    <img class="img-fluid" src="img/main-icon.png" style="max-height: 22px;margin-left: .6rem">
                                                    <a class="item-link" href="#">كيف أثقف نفسي دينيا؟</a>

                                                </div>

                                            </li>-->


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

                                الصوتيات والمحاضرات

                            </div>
                            <a class="header-more duplicated-more-btn " href="acoustics-categories.html">

                                <span class="title-text">المزيد</span>

                            </a>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content scroll table-responsive ">

                                <div class="items-cols">

                                    <div class="row gx-0">

                                        <div class="col-12">

                                            <div class="lectures-items-banner">
                                                <div class="lectures-items-title ">

                                                    <div class="title-item me-1">المحاضرين</div>
                                                    <div class="title-item">الدروس</div>
                                                    <div class="title-item">الحلقات</div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="scroll-content scroll">

                                                <div class="duplicated-box  lessons-style duplicated-box-2 child-box ">

                                                        <div class="body-content ">

                                                            <ul class="body-list  lessons-list">

                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                                <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20">
                                                                                      <path id="user" d="M8.5,10a4.93,4.93,0,0,0,4.857-5A4.93,4.93,0,0,0,8.5,0,4.93,4.93,0,0,0,3.643,5,4.93,4.93,0,0,0,8.5,10Zm1.924,1.875H6.576A6.676,6.676,0,0,0,0,18.646,1.335,1.335,0,0,0,1.315,20h14.37A1.333,1.333,0,0,0,17,18.646,6.676,6.676,0,0,0,10.424,11.876Z" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">أبوبكر الجزائري</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11.675" viewBox="0 0 15 11.675">
                                                                                  <path id="folder-open" d="M3.852,36.17h8.657V34.919a1.251,1.251,0,0,0-1.251-1.251H7.089L5.421,32H1.251A1.251,1.251,0,0,0,0,33.251v8.558l2.36-4.72A1.662,1.662,0,0,1,3.852,36.17Zm10.3.834H3.852a.831.831,0,0,0-.745.461L0,43.675H11.652a.834.834,0,0,0,.746-.461l2.5-5A.819.819,0,0,0,14.154,37Z" transform="translate(0 -32)"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">150</span>

                                                                        </div>

                                                                    </div>

                                                                </li>


                                                            </ul>

                                                        </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="scroll-content scroll">

                                                <div class="duplicated-box  lessons-style duplicated-box-2 child-box ">

                                                        <div class="body-content ">

                                                            <ul class="body-list  lessons-list">

                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>
                                                               <li class="list-item" id="">

                                                                    <div class="item-content">


                                                                        <div class="item-type item-link" >

                                                                                <span class="icon">

                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                                                                      <path id="indent" d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z" transform="translate(0 -32)" />
                                                                                    </svg>

                                                                                </span>
                                                                                <span class="text">سلسلة شرح كتاب التوحيد</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10.687" viewBox="0 0 15 10.687">
                                                                                  <path id="volume-high" d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z" transform="translate(0 -28.001)" />
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">17</span>

                                                                        </div>

                                                                    </div>

                                                                </li>


                                                            </ul>

                                                        </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="scroll-content scroll">

                                                <div class="duplicated-box box-lg  lessons-style duplicated-box-2 child-box  aduio_player ">


                                                        <div class="body-content ">

                                                            <ul class="body-list  lessons-list">

                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content active" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                                <li class="list-item">

                                                                    <a class="aduio-item item-content" href="#">


                                                                        <div class="item-type item-link">

                                                                                <span class="icon">



                                                                                </span>
                                                                                <span class="text">الأصول من علم الأصول</span>

                                                                            </div>

                                                                        <div class="item-type sub-content">

                                                                            <span class="icon">

                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                                                  <path id="clock" d="M6.8,3.516a.7.7,0,0,1,1.406,0V7.125l2.5,1.664a.679.679,0,0,1,.17.976.645.645,0,0,1-.949.17L7.11,8.06A.642.642,0,0,1,6.8,7.474ZM7.5,0A7.5,7.5,0,1,1,0,7.5,7.5,7.5,0,0,1,7.5,0ZM1.406,7.5A6.094,6.094,0,1,0,7.5,1.406,6.093,6.093,0,0,0,1.406,7.5Z"/>
                                                                                </svg>


                                                                            </span>
                                                                            <span class="text">120:30</span>

                                                                        </div>

                                                                    </a>

                                                                </li>


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

                                الكتب

                            </div>
                            <a class="header-more duplicated-more-btn " href="#">

                                <span class="title-text">المزيد</span>

                            </a>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content books-item">

                                  <div class="books-container ">

                                        <div class="books-slider-container slider-container">


                                            <div class="swiper books-slider">

                                              <div class="swiper-wrapper">

                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/SeeretIbenHisham.png">
                                                            </div>
                                                            <a class="book-name" href="#">السيرة النبوية</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                 ابن هشام
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/cover.png">
                                                            </div>
                                                            <a class="book-name" href="#">كتاب القرآن</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                ابي معاذ طارق بن عوض الله
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/Sbukhari.png">
                                                            </div>
                                                            <a class="book-name" href="#">صحيح البخاري</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                 ابي عبدالله محمد بن اسماعيل
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/book1.png">
                                                            </div>
                                                            <a class="book-name" href="#">العقيدة الوسطية</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                 صالح بن فوزان بن عبدالله
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/book2.png">
                                                            </div>
                                                            <a class="book-name" href="#">الحيدة والاعتذار</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                 عبد العزيز الكناني
                                                            </div>


                                                        </div>

                                                    </div>

                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/SeeretIbenHisham.png">
                                                            </div>
                                                            <a class="book-name" href="#">السيرة النبوية</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                 ابن هشام
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="swiper-slide">

                                                        <div class="book-item">

                                                            <div class="book-img">

                                                                <img class="img-fluid" src="img/cover.png">
                                                            </div>
                                                            <a class="book-name" href="#">كتاب القرآن</a>
                                                            <div class="book-info">
                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                        <path d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z"></path>
                                                                    </svg>


                                                                </span>

                                                                ابي معاذ طارق بن عوض الله
                                                            </div>


                                                        </div>

                                                    </div>


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
                            <img class="img-fluid footer-img" src="img/logo2.png" alt="الموسوعة الاسلامية - Islamic Encyclopedia">
                        </a>

                        <p class="footer-about">

                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها
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
    <script src="/js/main.js"></script>

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


</body>

</html>
