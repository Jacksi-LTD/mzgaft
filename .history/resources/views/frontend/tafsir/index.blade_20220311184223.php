@extends('layouts.frontend')
@section('page_title', 'التفسير')

@section('content')
    <!-- ***** articles-categories-section Start ***** -->

    <section class="section-style articles-categories-section categories-section ">

        <div class="container">

            <div class="articles-categories-container categories-container ">

                <div class="duplicated-box box-lg">

                    <div class="box-header">

                        <div class="header-title ">

                            السور

                        </div>

                    </div>
                    <div class="box-body box-padding">

                        <div class="body-type articles-categories-items categories-items single-items">

                            <div
                                class="row row-cols-xl-5  row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-center align-items-start">

                                @foreach ($surahs as $surah)
                                    <div class="category-wrap">

                                        <a class="category-link"
                                            href="{{ route('frontend.blogs.category', $surah->id) }}">


                                            <div class="main-content">

                                                <span class="icon">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.272" height="15"
                                                        viewBox="0 0 19.272 15">
                                                        <path id="folder-open"
                                                            d="M4.949,37.357H16.071V35.75a1.608,1.608,0,0,0-1.607-1.607H9.107L6.964,32H1.607A1.607,1.607,0,0,0,0,33.607v11l3.031-6.064A2.135,2.135,0,0,1,4.949,37.357Zm13.235,1.071H4.949a1.067,1.067,0,0,0-.958.593L0,47H14.97a1.072,1.072,0,0,0,.958-.592l3.214-6.429A1.052,1.052,0,0,0,18.184,38.429Z"
                                                            transform="translate(0 -32)" />
                                                    </svg>


                                                </span>
                                                <span class="text">{{ $surah->name }}</span>


                                            </div>

                                        </a>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ***** articles-categories-section End ***** -->

@endsection
