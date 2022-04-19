@extends('layouts.frontend')
@section('content')
@section('page_title', $surah->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/tafsir">التفسير</a></li>
@endsection
    <!-- ***** surah-cols-section Start ***** -->

    <section class="section-style surah-cols section-cols">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 half order-2 order-lg-1">

                    <div class="side-box-container">


                        <div class="box-wrap">

                            <div class="duplicated-box-wrapper categories-container">

                                <div
                                    class="duplicated-box box-side side-surahs surahs-list-items  more-loading article-style no-info">

                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            السور

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content" style="overflow-y: scroll; height:400px;">

                                            <ul class="body-list articles-list">
                                                @foreach ($surahs as $surah_side)
                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-icon">

                                                                <img class="img-fluid" src="/img/main-icon.png">
                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link active"
                                                                    href="{{ route('frontend.tafsir.show', $surah_side->id) }}">

                                                                    {{ $surah_side->name }}

                                                                </a>
                                                            </div>

                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="duplicated-box-wrapper categories-container">

                                <div
                                    class="duplicated-box box-side side-surahs surahs-list-items  more-loading article-style no-info">

                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            الآيات

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content" style="overflow-y: scroll; height:400px;">

                                            <ul class="body-list articles-list">
                                                @foreach (range(1, $surah->number) as $key => $number)
                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-icon">

                                                                <img class="img-fluid" src="/img/main-icon.png">
                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link active" href="#{{ $key + 1 }}">

                                                                    الآية {{ $key + 1 }}

                                                                </a>
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
                <div class="col-lg-8 half order-1 order-lg-2">

                    <div class="article-detalis-box surah-tafser-box box-container">

                        <div class="article-title">

                            <p class="line-height-more">{{ $surah->name }}</p>

                        </div>

                        <div class="article-info">

                            <div class="info-item ">

                                النزول :
                                <span>{{ App\Models\Surah::DOWNLOAD_RADIO[$surah->download] ?? '' }}</span>
                            </div>
                            <div class="info-item ">


                                عدد الآيات :
                                <span>{{ $surah->number }}</span>
                            </div>

                        </div>

                        <div class="texts-container">
                            @foreach ($surah->surahAyas as $key => $aya)
                                <p class="text-item" id="{{ $key + 1 }}">

                                    <span class="bold">{ {{ $aya->number }} } { {{ $aya->aya }} }</span>
                                    {{ $aya->tafsir }}
                                </p>
                            @endforeach

                        </div>

                        <div class="pagination-arrows">

                            <a class="arrow-item prev-btn {{ !$prev ? 'disabled' : '' }}"
                                href="{{ $prev ? route('frontend.tafsir.show', $prev->id) : '#' }}">

                                <i class="fa-solid fa-angle-right"></i>

                                السورة السابقة

                                <span>({{ $prev ? $prev->name : 'لايوجد' }})</span>


                            </a>
                            <a class="arrow-item next-btn {{ !$next ? 'disabled' : '' }}"
                                href="{{ $next ? route('frontend.tafsir.show', $next->id) : '#' }}">

                                السورة التالية

                                <span>({{ $next ? $next->name : 'لايوجد' }})</span>

                                <i class="fa-solid fa-angle-left"></i>

                            </a>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

    <!-- ***** surah-cols-section End ***** -->
@endsection
