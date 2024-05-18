@extends('layouts.frontend')
@section('content')
@section('page_title', trans('app.youtubevideos'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.youtubevideos.index') }}">{{trans('app.youtubevideos')}}</a></li>

    @if (isset($parent))
        <li class="breadcrumb-item"><a href="{{ route('frontend.youtubevideos.category', $youtubeVideo->category_id) }}">{{ $youtubeVideo->category->name }}</a>
        </li>
    @endif

@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $youtubeVideo->title }}

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">

                                <div class="lesson-perview-area">


                                    <div class="book-wrap">

                                        <div class="book-item">

                                            <iframe width="420" height="345" src="{{$youtubeVideo->url}}">
                                            </iframe>
                                        </div>

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


