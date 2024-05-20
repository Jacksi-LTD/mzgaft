@extends('layouts.frontend')
@section('content')
@section('page_title', $product->name)
@section('page_title', trans('app.products'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.product.index') }}">{{trans('app.products')}}</a></li>


        <li class="breadcrumb-item"><a href="{{ route('frontend.product.category', $product->category_id) }}">{{ @$parent->category->name }}</a>
        </li>


@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $product->name }}

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">

                                <div class="lesson-perview-area">


                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ $product->image?->getUrl() }}">
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    {!! $product->details !!}

                                    <br/>
                                    <div class="perview-btns" style="margin-top: 10px;">


                                            <button class="perview-btn audio-btn by_cart" data-id="{{$product->id}}" type="button" s>
                                                <i class="fa-solid fa-plus"></i>
                                                <span>{{trans('app.add_to_cart')}}</span>
                                            </button>


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


@section('scripts')


    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('.by_cart').on('click',function () {
            var id =$(this).data("id");
            $.ajax({
                url: '{{url('store_cart')}}',
                type: 'post',
                data: {_token: '{{csrf_token()}}', id: id},
                beforeSend: function () {

                }, success: function (data) {
                    toastr.options = {
                        "closeButton": true,
                        "newestOnTop": false,
                        "progressBar": true,
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr.success("{{trans('app.added_successfly')}}");
                }

            });
        });
    </script>

@endsection
