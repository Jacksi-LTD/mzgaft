@extends('layouts.frontend')
@section('page_title', trans('app.attentions'))

@section('content')
    <!-- ***** articles-categories-section Start ***** -->

    <section class="section-style articles-categories-section categories-section ">

        <div class="container">

            <div class="articles-categories-container categories-container ">

                <div class="duplicated-box box-lg">

                    <div class="box-header">

                        <div class="header-title ">

                       {{trans('app.attentions')}}

                        </div>

                    </div>
                    <div class="box-body box-padding">
                        <div class="col-lg-12">

                            <div class="duplicated-box-wrapper box-container ">

                                <div class="duplicated-box box-lg  lessons-style duplicated-box-2 ">

                                    <div class="box-body box-padding">

                                        <div class="body-content ">

                                            <ul class="body-list  lessons-list">
                                                @foreach ($attentions as $audio)
                                                    <li class="list-item">

                                                        <div class="item-content">

                                                            <a class="item-type item-link"
                                                               href="#">

                                                        <span class="icon">

                                                            <img height="17" src="{{asset('/img/bell.png')}}">

                                                        </span>

                                                                <span class="text">{{ $audio->title }}</span>

                                                                <p>{{$audio->details}}</p>

                                                            </a>

                                                        </div>

                                                    </li>
                                                @endforeach

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                {{ $attentions->links() }}

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection