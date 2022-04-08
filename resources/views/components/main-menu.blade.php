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

                        <a class="menu-item {{request()->is('/') ? 'active':''}}" href="{{route('frontend.home')}}"><span>الرئيسية</span></a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('tafsir*') ? 'active':''}}" href="{{route('frontend.tafsir.index')}}"> <span>تفسير القرآن</span></a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('blogs*') ? 'active':''}}" href="{{route('frontend.blogs.index')}}"><span>المقالات</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('audios*') ? 'active':''}}" href="{{route('frontend.audios.index')}}"> <span>الصوتيات</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('audio-books*') ? 'active':''}}" href="{{route('frontend.audio-books.index')}}"> <span>الكتب الصوتية</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('books*') ? 'active':''}}" href="{{route('frontend.books.index')}}"> <span>الكتب</span></a>

                    </div>

                    <div class="item-wrap">

                        <a class="menu-item {{request()->is('questions*') ? 'active':''}}" href="{{route('frontend.questions.index')}}">  <span>اسالة واجوبة</span> </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
