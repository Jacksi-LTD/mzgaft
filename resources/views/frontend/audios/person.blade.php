@extends('layouts.frontend')
@section('page_title', $person->name)
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

                                    دروس {{ $person->name }}

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
                                                <li class="list-item">

                                                    <div class="statistics-item">

                                                        <span class="statistics-text">

                                                            اجمالي مرات الاستماع
                                                            :

                                                        </span>
                                                        <span class="statistics-val">120,560</span>

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

                                            <ul class="body-list articles-list">
                                                @foreach ($some_audios as $audio)
                                                    <li class="list-item">
                                                        <div class="item-wrap">

                                                            <div class="item-icon">

                                                                {{-- <img class="img-fluid" src="/img/main-icon.png"> --}}
                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link" href="{{ route('frontend.audios.show', $audio->id) }}">{{ $audio->title }}</a>

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


            </div>

        </div>

    </section>

@endsection
