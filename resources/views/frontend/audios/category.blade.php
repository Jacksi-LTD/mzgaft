@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.audios.index') }}">الصوتيات</a></li>
    </li>
@endsection
@section('content')


    <section class="section-style lessons-section section-cols">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 half">

                    <div class="duplicated-box-wrapper box-container ">

                        <div class="duplicated-box box-lg  lessons-style duplicated-box-2 ">

                            <div class="box-header box-padding ">

                                <div class="header-title ">

                                    دروس {{ $category->name }}

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

                                    <ul class="body-list  lessons-list">
                                        @foreach ($audios as $audio)
                                            <li class="list-item">

                                                <div class="item-content">

                                                    <a class="item-type item-link"
                                                        href="{{ route('frontend.audios.show', $audio->id) }}">

                                                        <span class="icon">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                                viewBox="0 0 17 17">
                                                                <path id="indent"
                                                                    d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z"
                                                                    transform="translate(0 -32)" />
                                                            </svg>

                                                        </span>

                                                        <span class="text">{{ $audio->title }}</span>

                                                    </a>

                                                    <div class="item-type sub-content">

                                                        <span class="icon">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                                height="10.687" viewBox="0 0 15 10.687">
                                                                <path id="volume-high"
                                                                    d="M9.67,31.61a.562.562,0,0,0-.712.871,1.081,1.081,0,0,1,0,1.706.562.562,0,0,0,.712.871,2.2,2.2,0,0,0,0-3.447Zm1.418-1.73a.562.562,0,1,0-.713.869,3.3,3.3,0,0,1,1.25,2.574,3.413,3.413,0,0,1-1.249,2.595.562.562,0,0,0,.713.869,4.42,4.42,0,0,0,0-6.907Zm1.437-1.753a.562.562,0,1,0-.713.869,5.59,5.59,0,0,1,0,8.675.561.561,0,0,0-.078.791.523.523,0,0,0,.436.226.561.561,0,0,0,.357-.127A6.733,6.733,0,0,0,15,33.323,6.648,6.648,0,0,0,12.525,28.127Zm-5.466.037a.752.752,0,0,0-.807.124L3.089,31.1H1.125A1.125,1.125,0,0,0,0,32.221v2.248a1.125,1.125,0,0,0,1.125,1.124H3.09L6.252,38.4a.751.751,0,0,0,.807.122.746.746,0,0,0,.442-.681V28.847A.747.747,0,0,0,7.059,28.164Z"
                                                                    transform="translate(0 -28.001)" />
                                                            </svg>


                                                        </span>

                                                        <span class="text">{{ $audio->files->count() }}</span>

                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{ $audios->links() }}

                    </div>


                </div>
                <div class="col-lg-4 half">

                    <div class="side-box-container">
                        @unless($category->childCategories->isEmpty())
                            <div class="box-wrap">

                                <div class="articles-container side-box-style     categories-container">

                                    <div class="duplicated-box box-side side-categories">

                                        <div class="box-header ">

                                            <div class="header-title ">

                                                الاقسام الفرعية

                                            </div>


                                        </div>
                                        <div class="box-body box-padding">

                                            <div
                                                class="row row-cols-lg-1  row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-center align-items-start">
                                                @foreach ($category->childCategories as $sub_category)
                                                    <div class="category-wrap">

                                                        <a class="category-link"
                                                            href="{{ route('frontend.audios.category', $sub_category->id) }}">


                                                            <div class="main-content">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.272"
                                                                        height="15" viewBox="0 0 19.272 15">
                                                                        <path id="folder-open"
                                                                            d="M4.949,37.357H16.071V35.75a1.608,1.608,0,0,0-1.607-1.607H9.107L6.964,32H1.607A1.607,1.607,0,0,0,0,33.607v11l3.031-6.064A2.135,2.135,0,0,1,4.949,37.357Zm13.235,1.071H4.949a1.067,1.067,0,0,0-.958.593L0,47H14.97a1.072,1.072,0,0,0,.958-.592l3.214-6.429A1.052,1.052,0,0,0,18.184,38.429Z"
                                                                            transform="translate(0 -32)" />
                                                                    </svg>


                                                                </span>
                                                                <span class="text">{{ $sub_category->name }}</span>


                                                            </div>

                                                        </a>

                                                    </div>
                                                @endforeach


                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        @endunless

                        <div class="box-wrap" style="display: none">


                            <div class="duplicated-box-wrapper">

                                <div class="duplicated-box box-lg box-side side-statistics  duplicated-box-2 ">


                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            احصائيات

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list statistics-list">

                                                <li class="list-item">

                                                    <div class="statistics-item">

                                                        <span class="statistics-text">

                                                            اجمالي الدروس
                                                            :

                                                        </span>
                                                        <span class="statistics-val">150</span>

                                                    </div>

                                                </li>
                                                <li class="list-item">

                                                    <div class="statistics-item">

                                                        <span class="statistics-text">

                                                            اجمالي الحلقات
                                                            :

                                                        </span>
                                                        <span class="statistics-val">962</span>

                                                    </div>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>


                            </div>


                        </div>

                        <div class="box-wrap">


                            <div class="duplicated-box-wrapper">

                                <div class="duplicated-box box-lg box-side side-lessons lessons-style duplicated-box-2 ">

                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            حلقات مختارة

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list lessons-list">
                                                @foreach ($some_audios as $audio)
                                                    <li class="list-item">

                                                        <div class="item-content">


                                                            <a class="item-type item-link"
                                                                href="{{ route('frontend.audios.show', $audio->id) }}">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                        height="13.998" viewBox="0 0 12 13.998">
                                                                        <path id="play"
                                                                            d="M11.281,37.718A1.5,1.5,0,0,1,12,39a1.425,1.425,0,0,1-.719,1.253l-9,5.5a1.442,1.442,0,0,1-1.516.056A1.5,1.5,0,0,1,0,44.5v-11a1.5,1.5,0,0,1,2.282-1.28Z"
                                                                            transform="translate(0 -31.999)" />
                                                                    </svg>


                                                                </span>
                                                                <span class="text">{{ $audio->title }}</span>

                                                            </a>

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


            </div>

        </div>

    </section>

@endsection
