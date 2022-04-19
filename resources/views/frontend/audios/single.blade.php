@extends('layouts.frontend')
@section('content')
@section('page_title', $media->name)
@section('page_title', 'الصوتيات')


<section class="section-style lesson-section section-cols">

    <div class="container">

        <div class="row">


            <div class="col-lg-8 half">

                <div class="duplicated-box-wrapper box-container">

                    <div class="duplicated-box box-lg lessons-style duplicated-box-2">

                        <div class="box-header box-padding ">

                            <div class="header-title ">

                                {{ $media->name }}

                            </div>

                        </div>
                        <div class="box-body box-padding">

                            <div class="body-content ">

                                <div class="lesson-perview-area">

                                    <div class="perview-btns">

                                        <button class="perview-btn audio-btn   " type="button" id="playAudiobtn">

                                            <i class="fa-solid fa-play"></i>
                                            <span>استماع</span>

                                        </button>

                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                        <button class="perview-btn download-btn noty-btn" type="button">

                                            <i class="fa-solid fa-download"></i>
                                            <span>تحميل</span>

                                        </button>
                                        </a>
                                    </div>

                                    <div class="audio-area" id="audioArea">

                                        <div class="audio-wrap">

                                            <audio controls class="audio-item" id="audio-item">
                                                <source src="{{ $media->getUrl() }}" type="audio/ogg">
                                                <source src="{{ $media->getUrl() }}" type="audio/mpeg">
                                            </audio>
                                            <div class=" close-audio" id="closeAudio">

                                                <i class="fa-solid fa-xmark"></i>
                                                إغلاق

                                            </div>

                                        </div>

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
            <div class="col-lg-4 half">

                <div class="side-box-container">

                    <div class="box-wrap">


                        <div class="duplicated-box-wrapper">

                            <div class="duplicated-box box-lg box-side side-statistics  duplicated-box-2 ">

                                <div class="box-header box-padding ">

                                    <div class="header-title ">

                                        احصائيات

                                    </div>


                                </div>
                                <div class="box-body box-padding">

                                    <div class="body-content ">

                                        <ul class="body-list statistics-list">

                                            <li class="list-item">

                                                <div class="statistics-item">

                                                    <span class="statistics-text">

                                                        اجمالي مرات الاستماع
                                                        :

                                                    </span>
                                                    <span class="statistics-val">{{ $audio->visits ?? '0'}}</span>

                                                </div>

                                            </li>


                                        </ul>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

<script>

    /*** noty general style ***/
    $(".download-btn").click(function(){


        var n = new Noty({
                       type: 'success', //error//
                       theme: 'bootstrap-v4',
                       layout: 'topRight',
                       timeout: '2000',
                       progressBar: true,
                       closeWith: ['click'],
                       text: '<i class="fa-solid fa-circle-check ms-1"></i> تم تنزيل الحلقة بنجاح',
                   }).show();

    });



    /*** show audio  ***/
    var flag = false;
    $("#playAudiobtn").on("click" , function(){


        flag = !flag;
        if(flag){
            $('#audio-item').get(0).play();

        }else{
            $('#audio-item').get(0).pause();
        }
        $('#audioArea').fadeToggle();


    });
    $("#closeAudio").on("click" , function(){

        $('#audioArea').fadeOut();
        $('#audio-item').get(0).pause();

    });

    function stopAudio(audio) {
    audio.pause();
    audio.currentTime = 0;
}

</script>




@endsection
