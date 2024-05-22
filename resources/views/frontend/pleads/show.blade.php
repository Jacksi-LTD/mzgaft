@extends('layouts.frontend')
@section('content')
@section('page_title', $plead->title)
@section('page_title', trans('app.pleads'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.pleads.index') }}">{{trans('app.pleads')}}</a></li>

@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $plead->title }}

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">

                                <div class="lesson-perview-area">



                                    {!! $plead->details !!}



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
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

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
            text: '<i class="fa-solid fa-circle-check ms-1"></i> سەرکەفتییانە هاتە دابەزاندن',
        }).show();

    });



    /*** show audio  ***/
    var flag = false;
    $("#playAudiobtn").on("click", function() {


        flag = !flag;
        if (flag) {
            $('#audio-item').get(0).play();

        } else {
            $('#audio-item').get(0).pause();
        }
        $('#audioArea').fadeToggle();


    });
    $("#closeAudio").on("click", function() {

        $('#audioArea').fadeOut();
        $('#audio-item').get(0).pause();

    });

    function stopAudio(audio) {
        audio.pause();
        audio.currentTime = 0;
    }
</script>




@endsection
