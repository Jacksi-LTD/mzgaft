@extends('layouts.frontend')
@section('content')
@section('page_title', $prayer->title)
@section('page_title', trans('app.prayer books'))
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('frontend.prayer.index') }}">{{trans('app.prayer books')}}</a></li>



@endsection


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">

            <div class="col-lg-12 half">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $prayer->title }}

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">

                                <div class="lesson-perview-area">


                                    <div class="book-wrap">

                                        <div class="book-item">
                                            <div class="book-img">

                                                <img class="img-fluid" src="{{ $prayer->image?->getUrl() }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="perview-btns">

                                        <a href="{{ $prayer->file->getUrl() }}" target="_blank">
                                            <button class="perview-btn audio-btn   " type="button" s>
                                                <i class="fa-solid fa-download"></i>
                                                <span>PDF</span>
                                            </button>
                                        </a>

                                    </div>

                                </div>
                            </div>

                        </div>


                        <br>
                        <div class="box-body box-padding">

                            <div class="body-content">



                            </div>

                            <x-share-box />
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
