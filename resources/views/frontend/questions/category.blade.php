@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.questions.index') }}">پرسیار و بەرسڤ</a></li>
    @php
        $parent = $category->parentCategory;
        $up_parent = $parent?->parentCategory;
    @endphp
    @if ($up_parent)
        <li class="breadcrumb-item"><a
                href="{{ route('frontend.questions.category', $up_parent->id) }}">{{ $up_parent->name }}</a>
        </li>
    @endif
    @if ($parent)
        <li class="breadcrumb-item"><a href="{{ route('frontend.questions.category', $parent->id) }}">{{ $parent->name }}</a>
        </li>
    @endif
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

                                    پرسیار و بەرسڤ

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

                                    <ul class="body-list  lessons-list">
                                        @foreach ($questions as $question)
                                            <li class="list-item">

                                                <div class="item-content">


                                                    <a class="item-type item-link"
                                                        href="{{ route('frontend.questions.show', $question->id) }}">

                                                        <span class="icon">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                                viewBox="0 0 17 17">
                                                                <path id="indent"
                                                                    d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z"
                                                                    transform="translate(0 -32)" />
                                                            </svg>

                                                        </span>
                                                        <span class="text">{{ $question->title }}</span>

                                                    </a>



                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>
                        {{ $questions->links() }}
                    </div>


                </div>
                <div class="col-lg-4 half">

                    <div class="side-box-container">
                        @if ($category->childCategories)

                        <div class="box-wrap">

                            <div class="duplicated-box-wrapper categories-container ">

                                <div
                                    class="duplicated-box box-side side-categories  articles-categories-items single-items">
                                    @if ($category->childCategories->count())
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
                                                            href="{{ route('frontend.questions.category', $sub_category->id) }}">


                                                            <div class="main-content">

                                                                <span class="icon">

                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="19.272" height="15"
                                                                        viewBox="0 0 19.272 15">
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
                                    @endif
                                </div>

                            </div>


                        </div>
                    @endif
                        <div class="box-wrap">


                            <div class="duplicated-box-wrapper">

                                <div class="duplicated-box box-lg box-side side-statistics  duplicated-box-2 ">

                                    <div class="box-header box-padding ">

                                        <div class="header-title ">

                                            ئامار

                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list statistics-list">

                                                <li class="list-item">

                                                    <div class="statistics-item">

                                                        <span class="statistics-text">

                                                            سەرجەمێ پرسیاران
                                                            :

                                                        </span>
                                                        <span class="statistics-val">{{ $count }}</span>

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

                                            پرسیار و بەرسڤ


                                        </div>


                                    </div>
                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list lessons-list">
                                                @foreach ($some_questions as $question)



                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-content">

                                                                <a class="item-link" href="{{route('frontend.questions.show', $question->id )}}">{{ $question->title }}</a>

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
