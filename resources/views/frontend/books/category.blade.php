@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/books">پەرتۆک</a></li>

@endsection



@section('content')
    <section class="section-style books-section">

        <div class="container">


            <div class="duplicated-box box-lg row-books-box pb-0">

                <div class="box-header box-padding space-between">

                    <div class="header-title ">
                        پەرتۆک
                    </div>


                </div>
                <div class="box-body box-padding">

                    <div class="body-content books-item">

                        <div class="books-container row-books-container">

                            <div
                                class="row row row-cols-xl-5 row-cols-lg-4   row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start  ">
                                @foreach ($books as $book)
                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ $book->image?->getUrl() }}">
                                            </div>
                                            <a class="book-name" href="{{ route('frontend.books.show', $book->id) }}">

                                                {{ $book->title }}
                                            </a>
                                            <div class="book-info">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                        <path
                                                            d="M6.5,7.5A3.75,3.75,0,1,0,2.786,3.75,3.732,3.732,0,0,0,6.5,7.5ZM7.971,8.907H5.029A5.054,5.054,0,0,0,0,13.984,1.011,1.011,0,0,0,1.006,15H11.995A1.009,1.009,0,0,0,13,13.984,5.054,5.054,0,0,0,7.971,8.907Z">
                                                        </path>
                                                    </svg>

                                                </span>
                                                {{ $book->writer?->name }}
                                            </div>


                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>


                        {{ $books->links() }}


                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
