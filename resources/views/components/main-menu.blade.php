<div class="main-menu-container ">

    <div class="duplicated-box box-lg parent-box ">

        <div class="box-header box-padding space-between">

            <div class="header-title ">

                لیستا سەرەکی
            </div>
            <div class="header-more">
                    <script async src="https://cse.google.com/cse.js?cx=e7b93c7af49284538">
                    </script>
                    <div class="gcse-search"></div>
            </div>

        </div>
        <div class="box-body box-padding">

            <div class="body-content main-menu-items">

                <div
                    class="row row-cols-xl-7 row-cols-md-4 row-cols-sm-2 row-cols-2 justify-content-start row-flex gx-3 max-7">

                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ route('frontend.home') }}"><span>سەرەکی</span></a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('tafsir*') ? 'active' : '' }}"
                            href="{{ route('frontend.tafsir.index') }}"> <span>تەفسیرا قورئانێ</span></a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('blogs*') ? 'active' : '' }}"
                            href="{{ route('frontend.blogs.index') }}"><span>گوتار</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('audios*') ? 'active' : '' }}"
                            href="{{ route('frontend.audios.index') }}"> <span>وانێن دەنگی</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('audio-books*') ? 'active' : '' }}"
                            href="{{ route('frontend.audio-books.index') }}"> <span> پەرتۆکێن دەنگی</span> </a>

                    </div>
                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('books*') ? 'active' : '' }}"
                            href="{{ route('frontend.books.index') }}"> <span>پەرتۆک</span></a>

                    </div>

                    <div class="item-wrap">

                        <a class="menu-item {{ request()->is('questions*') ? 'active' : '' }}"
                            href="{{ route('frontend.questions.index') }}"> <span>پرسیار و بەرسڤ</span> </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
