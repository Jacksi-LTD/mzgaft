@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/product">{{trans('app.products')}}</a></li>

@endsection



@section('content')
    <style>
        .main_btn_m {
            display        : block;
            text-decoration: none;
            background     :linear-gradient(to top, #83acdf, #5f82ab);
            color: #eeeeee;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            padding: 2px 10px;
            transition: .7s;
            letter-spacing: 1px;
            margin-right: 20px;
            margin-top: 5px;
            border-color:#fff;
        }
    </style>
    <section class="section-style books-section">

        <div class="container">


            <div class="duplicated-box box-lg row-books-box pb-0">

                <div class="box-header box-padding space-between">

                    <div class="header-title ">
                        {{trans('app.products')}}
                    </div>


                </div>
                <div class="box-body box-padding">

                    <div class="body-content books-item">

                        <div class="books-container row-books-container">

                            <div
                                class="row row row-cols-xl-5 row-cols-lg-4   row-cols-md-3 row-cols-sm-2  row-cols-1 justify-content-start  ">
                                @foreach ($products as $book)
                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">
                                                <!--
                                                <img class="img-fluid" src="{{ $book->image?->getUrl() }}">-->
                                                    <img class="img-fluid" src="{{asset('img/book1.png')}}">
                                            </div>
                                            <a style="margin-right: 10px;" class="book-name" href="{{ route('frontend.product.show', $book->id) }}">

                                                {{ $book->name }}
                                            </a>
                                            <div style="margin-right: 10px;" class="book-info">
                                                <span>
                                                    {{trans('app.price')}}

                                                </span>
                                                {{ $book->price }}
                                            </div>
                                            <div class="book-info">
                                                <button data-id="{{$book->id}}" class="main_btn_m">{{trans('app.add_to_cart')}}</button>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>


                        {{ $products->links() }}


                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script>
       $('.main_btn_m').on('click',function () {
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