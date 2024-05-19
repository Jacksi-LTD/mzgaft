@extends('layouts.frontend')
@section('page_title', trans('app.donations'))
@section('breadcrumb')

@endsection

@section('content')

    <!-- ***** article-category-section Start ***** -->

    <section class="section-style article-category-section section-cols">

        <div class="container">

            <div class="row">


                <div class="col-lg-12 order-1 order-lg-1">

                    <div class="duplicated-box-wrapper box-container ">

                        <div class="duplicated-box box-lg article-style article-category-style">

                            <div class="box-header box-padding ">

                                <div class="header-title ">

                                    {{trans('app.donations')}}

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

                                    <ul class="body-list articles-list">
                                        @foreach ($donations as $donation)
                                            <li class="list-item" style="text-align: center;">

                                                <div class="item-wrap" style="display: block;">
                                                    <h2>{{trans('app.bank')}}  {{ $donation->bank }}</h2>
                                                    <div class="item-icon" style="text-align: -webkit-center;">

                                                        <img style="max-height: 250px;max-width: 450px;" src="{{$donation->image}}">
                                                    </div>
                                                    <div class="item-content">

                                                        <a class="item-link"
                                                            href="#"></a>

                                                        <div class="item-info" style="display: block;">

                                                            <span>

                                                              <h3> {{trans('app.trans_number')}}  {{ $donation->trans_number }}</h3>


                                                            </span>

                                                        </div>
                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{ $donations->links() }}


                    </div>


                </div>
            </div>

        </div>

    </section>

    <!-- ***** articles-section End ***** -->

@endsection
