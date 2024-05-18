@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/youtubevideos">{{trans('app.youtubevideos')}}</a></li>

@endsection



@section('content')
    <section class="section-style books-section">

        <div class="container">


            <div class="duplicated-box box-lg row-books-box pb-0">

                <div class="box-header box-padding space-between">

                    <div class="header-title ">
                        {{trans('app.youtubevideos')}}
                    </div>


                </div>
                <div class="box-body box-padding">

                    <div class="body-content books-item">

                        <div class="books-container row-books-container">

                            <div
                                class="row row row-cols-xl-5 row-cols-lg-4   row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start  ">
                                @foreach ($videos as $book)
                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ $book->image?->getUrl() }}">
                                            </div>
                                            <a class="book-name" href="{{ route('frontend.youtubevideos.show', $book->id) }}">

                                                {{ $book->title }}
                                            </a>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>


                        {{ $videos->links() }}


                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
