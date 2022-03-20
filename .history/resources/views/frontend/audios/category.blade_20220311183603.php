@extends('layouts.frontend')
@section('page_title', 'المقالات')

@section('content')


    <!-- ***** article-category-section Start ***** -->

    <section class="section-style article-category-section section-cols">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 half order-2 order-lg-1">

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

                        <div class="box-wrap">

                            <div class="articles-container side-box-style ">

                                <div class="duplicated-box box-side">

                                    <div class="box-header ">

                                        <div class="header-title ">

                                            صوتيات مختارة

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-type article-style">

                                            <ul class="articles-list">
                                                @foreach ($some_audios as $audio)
                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-icon">

                                                                <img class="img-fluid" src="/img/main-icon.png">
                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link" href="{{ route('frontend.audios.show',$audio->id) }}">{{ $audio->title }}</a>
                                                                <div class="item-info">
                                                                    {{-- {{dd($audio)}} --}}
                                                                    <span>

                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 14 14">
                                                                            <path
                                                                                d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                                                        </svg>


                                                                    </span>
                                                                    {{ $audio->writer?->name }}
                                                                </div>
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

                    <div class="articles-container article-category-style box-container ">

                        <div class="duplicated-box box-lg">

                            <div class="box-header ">

                                <div class="header-title ">

                                    المقالات

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-type article-style">

                                    <ul class="articles-list">
                                        @foreach ($audios as $audio)
                                            <li class="list-item">

                                                <div class="item-wrap">

                                                    <div class="item-icon">

                                                        <img class="img-fluid" src="/img/main-icon.png">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link"
                                                            href="{{ route('frontend.audios.show', $audio->id) }}">{{ $audio->title }}</a>
                                                        @if ($audio->writer)
                                                            <div class="item-info">

                                                                <span>

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 14 14">
                                                                        <path
                                                                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                                                    </svg>


                                                                </span>
                                                                {{ $audio->writer?->name }}
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                        <div class="bootstarp-pagination">

                            <nav aria-label="">
                                <ul class="pagination">

                                    <li class="page-item active" aria-current="page"><a class="page-link "
                                            href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">100</a></li>

                                </ul>
                            </nav>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </section>

    <!-- ***** articles-section End ***** -->

@endsection
