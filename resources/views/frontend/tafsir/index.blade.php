@extends('layouts.frontend')
@section('page_title', 'تەفسیر')

@section('content')
    <!-- ***** articles-categories-section Start ***** -->
    <section class="section-style surahs-section categories-section ">

        <div class="container">

            <div class="categories-container surahs-list-categories ">

                <div class="duplicated-box box-lg surahs-list-items  single-items more-loading">

                    <div class="box-header box-padding">

                        <div class="header-title ">

                            لیستا سوڕەتان

                        </div>

                    </div>
                    <div class="box-body box-padding">

                        <div class="body-content  ">

                            <div class="row row-cols-xl-5  row-cols-lg-4 row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start align-items-stretch gx-3">


                                @foreach ($surahs as $surah)
                                    <div class="category-wrap">

                                        <a class="category-link" href="{{ route('frontend.tafsir.show', $surah->id) }}">

                                            <div class="main-content">

                                                    <span class="icon">

                                                        <img class="img-fluid" src="img/main-icon.png">

                                                    </span>

                                                    <span class="text">
                                                        {{ $surah->name }}
                                                    </span>

                                                </div>

                                        </a>

                                    </div>
                                @endforeach

                            </div>

                            {{-- <button class="load-more-btn loading-btn" type="button">زێدەتر ببینە</button> --}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ***** articles-categories-section End ***** -->

@endsection
