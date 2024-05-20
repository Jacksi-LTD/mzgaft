@extends('layouts.frontend')
@section('page_title', trans('app.advice'))

@section('content')
    <!-- ***** articles-categories-section Start ***** -->

    <section class="section-style articles-categories-section categories-section ">

        <div class="container">

            <div class="articles-categories-container categories-container ">

                <div class="duplicated-box box-lg">

                    <div class="box-header">

                        <div class="header-title ">

                       {{trans('app.advice')}}

                        </div>

                    </div>
                    <div class="box-body box-padding">
                        <div class="col-lg-12">

                            <div class="duplicated-box-wrapper box-container ">

                                <div class="duplicated-box box-lg  lessons-style duplicated-box-2 ">

                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list  lessons-list">
                                                @foreach ($advices as $advice)
                                                    <li class="list-item">

                                                        <div class="item-wrap">

                                                            <div class="item-icon">


                                                            </div>
                                                            <div class="item-content">

                                                                <a class="item-link" href="#">{{$advice->title}}</a>

                                                                <div class="item-info" style="margin-right: 20px;">

                                                                    <span>




                                                                    </span>

                                                                     {{$advice->details}}
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                {{ $advices->links() }}

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection