@extends('layouts.frontend')
@section('content')
@section('page_title', trans('app.success_order'))
@section('breadcrumb')

@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">



                    <div class="duplicated-box-wrapper box-container">



                            <div class="box-header box-padding ">

                                <div class="header-title ">

                                    {{ trans('app.success_order')}}

                                </div>


                            </div>
                            <div class="box-body box-padding">
                                <center>
                              <img style="max-width: 300px;margin-top: 20px;" src="{{asset('/img/order_placed.png')}}">
                                </center>
                            </div>

                    </div>

            </div>
        </div>
    </div>
</section>
@endsection