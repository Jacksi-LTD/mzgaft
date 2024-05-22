@extends('layouts.frontend')
@section('content')
@section('page_title', $remembrance->title)
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.remembrances.index') }}">{{trans('app.remembrances')}}</a></li>

@endsection

<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 ">

                <div class="side-box-container">

                    <div class="box-wrap">


                        <div class="duplicated-box-wrapper">

                            <div class="duplicated-box box-lg box-side side-statistics  duplicated-box-2 ">

                                <div class="box-header box-padding ">

                                    <div class="header-title ">

                                        {{$remembrance->title}}     <span style="font-size: small;">({{$remembrance->repet}} {{trans('app.once')}} )</span>

                                    </div>


                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content ">

                                      {!! $remembrance->content !!}

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
<script>
    /*** noty general style ***/
    $(".download-btn").click(function() {


        var n = new Noty({

            type: 'success', //error//
            theme: 'bootstrap-v4',
            layout: 'topRight',
            timeout: '2000',
            progressBar: true,
            closeWith: ['click'],
            text: '<i class="fa-solid fa-circle-check ms-1"></i> ب سەرکەفتییانە هاتە خوارێ',



        }).show();


    });

    /*** show audio  ***/
    $("#playAudiobtn").on("click", function() {

        $('#audioArea').fadeToggle();

    });
    $("#closeAudio").on("click", function() {

        $('#audioArea').fadeOut();

    });
</script>
@endsection
