@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.audios.index') }}">المقالات</a></li>
    @php
    $parent = $category->parentCategory;
    $up_parent = $parent?->parentCategory;
    @endphp
    @if ($up_parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audios.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    @if ($parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.audios.category', $parent->id) }}">{{ $parent->name }}</a>
        </li>
    @endif
    </li>
@endsection

@section('content')

    <!-- ***** article-category-section Start ***** -->

    <section class="section-style article-category-section section-cols">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 half order-2 order-lg-1">

                    <div class="side-box-container">
                        @if ($category->childCategories)

                            <div class="box-wrap">

                                <div class="duplicated-box-wrapper categories-container ">

                                    <div
                                        class="duplicated-box box-side side-categories  articles-categories-items single-items">

                                        <div class="box-header box-padding ">

                                            <div class="header-title ">

                                                الاقسام الفرعية

                                            </div>


                                        </div>
                                        <div class="box-body box-padding">

                                            <div
                                                class="row row-cols-lg-1   row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start align-items-stretch gx-3">

                                                @foreach ($category->childCategories as $sub_category)
                                                    <div class="category-wrap">

                                                        <a class="category-link"
                                                            href="{{ route('frontend.blogs.category', $sub_category->id) }}">


                                                            <div class="main-content">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19.272"
                                                                        height="15" viewBox="0 0 19.272 15">
                                                                        <path id="folder-open"
                                                                            d="M4.949,37.357H16.071V35.75a1.608,1.608,0,0,0-1.607-1.607H9.107L6.964,32H1.607A1.607,1.607,0,0,0,0,33.607v11l3.031-6.064A2.135,2.135,0,0,1,4.949,37.357Zm13.235,1.071H4.949a1.067,1.067,0,0,0-.958.593L0,47H14.97a1.072,1.072,0,0,0,.958-.592l3.214-6.429A1.052,1.052,0,0,0,18.184,38.429Z"
                                                                            transform="translate(0 -32)" />
                                                                    </svg>


                                                                </span>
                                                                <span
                                                                    class="text">{{ $sub_category->name }}</span>


                                                            </div>

                                                        </a>

                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        @endif

                        <div class="box-wrap">

                            <div class="duplicated-box-wrapper">

                                <div class="duplicated-box box-side article-style side-articles">

                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            مقالات مختارة

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content">

                                            <ul class="body-list articles-list">
                                                @foreach ($some_blogs as $blog)
                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-icon">

                                                                <img class="img-fluid" src="/img/main-icon.png">
                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link"
                                                                    href="{{ route('frontend.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
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

                    <div class="duplicated-box-wrapper box-container ">

                        <div class="duplicated-box box-lg article-style article-category-style">

                            <div class="box-header box-padding ">

                                <div class="header-title ">

                                    المقالات

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

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

                                                        <div class="item-info">

                                                            <span>

                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                                    <path
                                                                        d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z" />
                                                                </svg>


                                                            </span>
                                                            {{ $blog->writer?->name }}
                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{ $blogs->links() }}


                    </div>


                </div>

            </div>

        </div>

    </section>

    <!-- ***** articles-section End ***** -->

@endsection
