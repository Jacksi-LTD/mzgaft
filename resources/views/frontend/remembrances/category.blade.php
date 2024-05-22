@extends('layouts.frontend')
@section('page_title', $category->name)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.audios.index') }}">وانێن دەنگی</a></li>
    </li>
@endsection
@section('content')


    <section class="section-style lessons-section section-cols">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <div class="duplicated-box-wrapper box-container ">

                        <div class="duplicated-box box-lg  lessons-style duplicated-box-2 ">

                            <div class="box-header box-padding ">

                                <div class="header-title ">

                                    وانە {{ $category->name }}

                                </div>


                            </div>
                            <div class="box-body box-padding">

                                <div class="body-content ">

                                    <ul class="body-list  lessons-list">
                                        @foreach ($remembrances as $remembrance)
                                            <li class="list-item">

                                                <div class="item-content">

                                                    <a class="item-type item-link"
                                                        href="{{ route('frontend.remembrances.show', $remembrance->id) }}">

                                                        <span class="icon">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                                viewBox="0 0 17 17">
                                                                <path id="indent"
                                                                    d="M0,33.214A1.214,1.214,0,0,1,1.214,32H15.786a1.214,1.214,0,0,1,0,2.429H1.214A1.214,1.214,0,0,1,0,33.214Zm7.286,4.857A1.213,1.213,0,0,1,8.5,36.857h7.286a1.214,1.214,0,1,1,0,2.429H8.5A1.213,1.213,0,0,1,7.286,38.071Zm8.5,3.643a1.214,1.214,0,1,1,0,2.429H8.5a1.214,1.214,0,1,1,0-2.429ZM0,47.786a1.214,1.214,0,0,1,1.214-1.214H15.786a1.214,1.214,0,1,1,0,2.429H1.214A1.214,1.214,0,0,1,0,47.786Zm.98-3.8A.607.607,0,0,1,0,43.509V37.491a.607.607,0,0,1,.98-.478l3.87,3.009a.654.654,0,0,1,0,.956Z"
                                                                    transform="translate(0 -32)" />
                                                            </svg>

                                                        </span>

                                                        <span class="text">{{ $remembrance->title }}</span>

                                                    </a>

                                                    <div class="item-type sub-content">

                                                     <span>{{$remembrance->repet}} {{trans('app.once')}} </span>

                                                    </div>

                                                </div>

                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                        {{ $remembrances->links() }}

                    </div>


                </div>



            </div>

        </div>

    </section>

@endsection
