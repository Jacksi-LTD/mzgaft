@extends('layouts.frontend')
@section('page_title', trans('app.tajweeds books'))
@section('breadcrumb')


@endsection



@section('content')
    <section class="section-style books-section">

        <div class="container">


            <div class="duplicated-box box-lg row-books-box pb-0">

                <div class="box-header box-padding space-between">

                    <div class="header-title ">
                        {{trans('app.tajweeds books')}}
                    </div>


                </div>
                <div class="box-body box-padding">

                    <div class="body-content books-item">

                        <div class="books-container row-books-container">

                            <div
                                    class="row row row-cols-xl-5 row-cols-lg-4   row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start  ">
                                @foreach ($tajweed as $book)
                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ @$book->image->url }}">
                                            </div>
                                            <a class="book-name" href="{{ route('frontend.tajweed.show', $book->id) }}">

                                                {{ $book->title }}
                                            </a>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>


                        {{ $tajweed->links() }}


                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
